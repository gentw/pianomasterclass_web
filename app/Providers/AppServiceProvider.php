<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Entities\Page;
use App\Entities\PageType;
use App\Entities\PageEntityGallery;
use App\Entities\PageGalleryImages;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      

        Schema::defaultStringLength(191);

        $globalArray = array(
            [
                "type" =>"operation-projects",
                "limit"=>7
            ],
            [
                "type" =>"water-spray",
                "limit"=>5
            ],
            [
                "type"=>"news-entries",
                "limit"=> 2
            ]
        );
        $one = array();
        $many = array();

        $index = -1;
        foreach ($globalArray as $key => $value){
            $pageType = PageType::with(['entities' => function ($query) use ($value) {
                $query->orderBy('order', 'desc');
                $query->select(['id', 'slugable', 'type_id']);
                if($value['limit'] != "all"){
                    $query->limit($value['limit']);
                }

            }, 'entities.collections' => function ($query) {
                $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
            }])->where('slug' , $value['type'])->get(['id', 'name', 'type', 'slug']);


            foreach ($pageType as $key => $value){

                if ($value->type == "one") {
                    $coll = $value->entities[0]->collections;

                    $formPost = $coll->reduce(function ($formPost, $coll) {
                        if($coll['field_type'] == "gallery"){
                            $gallery = PageEntityGallery::with(['images' => function ($query) {
                                $query->orderBy('order', 'desc');
                            }])->where('field_id', $coll['field_id'])->where('entity_id', $coll['entity_id'])->first();
                            $formPost[$coll['field_name']] = $gallery->images;
                            return $formPost;
                        }
                        $formPost[$coll['field_name']] = $coll['value'];
                        return $formPost;
                    }, []);

                    $one[0][$value->slug] = ["id" => $value->entities[0]->id, "slugable" =>$value->entities[0]->slugable, "collections" => $formPost];
                }else {
                    $index += 1;
                    $newObject = array($value->slug => []);
                    array_push($many, $newObject);
                    foreach ($value->entities as $entity) {
                        $coll = $entity->collections;

                        $formPost = $coll->reduce(function ($formPost, $coll) {
                            if($coll['field_type'] == "gallery"){
                                $gallery = PageEntityGallery::with(['images' => function ($query) {
                                    $query->orderBy('order', 'desc');
                                }])->where('field_id', $coll['field_id'])->where('entity_id', $coll['entity_id'])->first();
                                $formPost[$coll['field_name']] = $gallery->images;
                                return $formPost;
                            }
                            $formPost[$coll['field_name']] = $coll['value'];
                            return $formPost;
                        }, []);

                        array_push($many[$index][$value->slug], ["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]);


                    }
                }
            }

        }

        $global = array(
            "one" => $one,
            "many" =>$many
        );

        View::share('global', $global);

        //return array("global" => $global);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
