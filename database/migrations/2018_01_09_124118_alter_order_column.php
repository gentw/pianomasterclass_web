<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Entities\Language;
use App\Entities\PageEntity;
use App\Entities\PageGalleryImages;

class AlterOrderColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Alter language order
        Schema::table('cms_languages', function (Blueprint $table) {
            $table->integer('order')->nullable();
        });

        $languages = Language::get();

        $index = 1;
        if ($languages != null) {
            foreach ($languages as $language){
                $language->update(['order' => $index]);
                $index ++;
            }
        }

        Schema::table('cms_pages_entities', function (Blueprint $table) {
            $table->integer('order')->nullable();
        });

        $entities = PageEntity::whereHas('type', function ($q){
            $q->where('type' , 'many');
        })->get();

        $index = 1;
        if ($entities != null) {
            foreach ($entities as $entity){
                $entity->update(['order' => $index]);
                $index ++;
            }
        }

        Schema::table('cms_gallery_images', function (Blueprint $table) {
            $table->integer('order')->nullable();
        });

        $images = PageGalleryImages::get();

        $index = 1;
        if ($images != null) {
            foreach ($images as $image){
                $image->update(['order' => $index]);
                $index ++;
            }
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
