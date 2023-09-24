<?php

namespace App\Http\Controllers;

use App\Entities\PageCollection;
use App\Entities\PageEntity;
use App\Entities\PageEntityGallery;
use App\Entities\PageGalleryImages;
use Illuminate\Http\Request;
use App\Entities\PageType;
use App\Entities\PageFields;

class PageEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enities = PageEntity::with('collections')->get();

        return $enities;
    }


    public function getEntity($typeId)
    {
        $pageType = PageType::where('id', $typeId)->first();
        $fields = PageFields::where('page_type_id', $typeId)->get();

        if($pageType->type == "one"){

            if($pageType->edit == false) {
                $formPost = $fields->reduce(function ($formPost, $fields) {


                    $formPost[$fields['name']] = $fields['model'];

                    return $formPost;
                }, []);


                return array('form' => $formPost, 'fields' => $fields);
            }
            else{

                $collections = PageCollection::whereHas('entity', function ($q) use ($typeId){
                    $q->where('type_id', $typeId);
                })->get();

                $formPost = $collections->reduce(function ($formPost, $collections) {
                    if($collections['field_type'] == "gallery"){
                        $gallery = PageEntityGallery::with(['images' => function ($query) {
                            $query->orderBy('order', 'desc');
                        }])->where('field_id', $collections['field_id'])->where('entity_id', $collections['entity_id'])->first();
                        $formPost[$collections['field_name']] = $gallery->images;
                        return $formPost;
                    }
                    $formPost[$collections['field_name']] = $collections['value'];
                    return $formPost;

                    }, []);

                return array('form' => $formPost, 'fields' => $fields);

            }
        }
        else if($pageType->type == "many"){
            $formPost = $fields->reduce(function ($formPost, $fields) {

                $formPost[$fields['name']] = $fields['model'];

                return $formPost;

            }, []);

            return array('form' => $formPost, 'fields' => $fields);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $typeSlug)
    {


        $pageType = PageType::where('slug', $typeSlug)->first();
        $fields = PageFields::where('page_type_id', $pageType->id)->get();

        if($pageType->type == "one") {
            if($pageType->edit == false){
                $entity = $this->createOneEntity($request, $pageType, $fields);

                return $entity;
            }
            else{
                $entity = $this->updateOneEntity($request, $pageType);
                return $entity;

            }
        }

        if ($pageType->type == "many"){
            $entity = $this->createManyEntities($request, $pageType, $fields);
            return $entity;
        }


    }


    /**
     * Create OneEntity Logic
     *
     * @param Request $request
     * @param $pageType
     * @param $fields
     */
    public function createOneEntity(Request $request, $pageType, $fields)
    {

        $pageType->update(['edit' => true]);

        $entity = new PageEntity();
        $entity->type_id = $pageType->id;
        $entity->slug = $pageType->slug.'-'.time();

        $entity->save();

        foreach ($fields as $field){

            if($field->type == "editor" || $field->type == "text"){
                $collection = new PageCollection();

                $collection->entity_id  = $entity->id;
                $collection->field_id = $field->id;
                $collection->field_name = $field->name;
                $collection->field_type = $field->type;
                $collection->value =  array_map(function($value) {return $value === null ? "" : $value;}, $request->input($field->name));

                $collection->save();
            }
            else if($field->type == "file"){
                if($request->file($field->name) != null) {
                    $getimageName = $field->id . time() . '.' . $request->file($field->name)->getClientOriginalExtension();
                    $request->file($field->name)->move(public_path('img/manjakos'), $getimageName);

                    $collection = new PageCollection();

                    $collection->entity_id  = $entity->id;
                    $collection->field_id = $field->id;
                    $collection->field_name = $field->name;
                    $collection->field_type = $field->type;
                    $collection->value =  $getimageName;
                    $collection->save();
                }else {

                    $collection = new PageCollection();

                    $collection->entity_id = $entity->id;
                    $collection->field_id = $field->id;
                    $collection->field_name = $field->name;
                    $collection->field_type = $field->type;
                    $collection->value = "image";

                    $collection->save();
                }
            }else if($field->type == "gallery"){
                $collection = new PageCollection();
                $collection->entity_id  = $entity->id;
                $collection->field_id = $field->id;
                $collection->field_name = $field->name;
                $collection->field_type = $field->type;
                $collection->value = $field->model;
                $collection->save();

                $entityGallery = new PageEntityGallery();
                $entityGallery->entity_id = $entity->id;
                $entityGallery->field_id = $field->id;
                $entityGallery->save();


                $index = 0;
                foreach ($request->file($field->name) as $file){
                    $getimageName = $index.md5(time()).'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('img/manjakos'), $getimageName);

                    $images = new PageGalleryImages();
                    $images->gallery_id = $entityGallery->id;
                    $images->image = $getimageName;
                    $images->order = $index;
                    $images->save();
                    $index+=$images->id;
                }
            }
            else{

                $collection = new PageCollection();

                $collection->entity_id  = $entity->id;
                $collection->field_id = $field->id;
                $collection->field_name = $field->name;
                $collection->field_type = $field->type;
                $collection->value = $request->input($field->name);

                $collection->save();
            }

        }

        return $this->getEntity($entity->type_id);
    }

    /**
     * Edit OneEntity Logic
     *
     * @param Request $request
     * @param $pageType
     * @return mixed
     */
    public function updateOneEntity(Request $request, $pageType){

        $collections = PageCollection::whereHas('entity', function ($q) use ($pageType){
            $q->where('type_id', $pageType->id);
        })->get();

        foreach ($collections as $collection){

            if($collection->field_type == "editor" || $collection->field_type == "text"){

                $coll = PageCollection::find($collection->id);
                $coll->update(['value' => array_map(function($value) {return $value === null ? "" : $value;}, $request->input($collection->field_name))]);
            }
            else if($collection->field_type == "file" && $request->file($collection->field_name) != null){
                $getimageName = $collection->id.time().'.'.$request->file($collection->field_name)->getClientOriginalExtension();
                $request->file($collection->field_name)->move(public_path('img/manjakos'), $getimageName);

                $coll = PageCollection::find($collection->id);
                $coll->update(['value' => $getimageName]);
            }else if($collection->field_type == "gallery" && $request->file($collection->field_name) != null){

                $gallery = PageEntityGallery::where('entity_id', $collection->entity_id)->where('field_id', $collection->field_id)->first();

                $lastOrder = PageGalleryImages::where('gallery_id', $gallery->id)->orderBy('order', 'desc')->first();
                if($lastOrder == null){
                    $ltOrder = 1;
                }else{
                    $ltOrder = $lastOrder->order + 1;
                }
                $index = 0;

                foreach ($request->file($collection->field_name) as $file){
                    $getimageName = $index.md5(time()).'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('img/manjakos'), $getimageName);

                    $images = new PageGalleryImages();
                    $images->gallery_id = $gallery->id;
                    $images->image = $getimageName;
                    $images->order = $ltOrder;
                    $images->save();
                    $index += 1;
                    $ltOrder +=1;
                }

            }
            else {
                $coll = PageCollection::find($collection->id);
                $coll->update(['value' => $request->input($coll->field_name)]);
            }
        }

        return $this->getEntity($pageType->id);
    }

    /**
     * Create ManyEntity Logic
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createManyEntities(Request $request, $pageType, $fields)
    {
        $lastOrder = PageEntity::where('type_id', $pageType->id)->orderBy('order', 'desc')->first();

        if($lastOrder == null){
            $ltOrder = 1;
        }else{
            $ltOrder = $lastOrder->order + 1;
        }
        $entity = new PageEntity();
        $entity->type_id = $pageType->id;
        $entity->order = $ltOrder;
        $entity->slug = $pageType->slug.'-'.time();


        $entity->save();

        foreach ($fields as $field){

            if($field->slugable == true && $field->type == "text"){
                $collection = new PageCollection();

                $collection->entity_id  = $entity->id;
                $collection->field_id = $field->id;
                $collection->field_name = $field->name;
                $collection->field_type = $field->type;
                $collection->value =  array_map(function($value) {return $value === null ? "" : $value;}, $request->input($field->name));

                $entity->update(['slugable' => array_map(function($value) {return str_slug($value, '-');}, $request->input($field->name))]);

                $collection->save();
                $editorObject = [];
            }
            if($field->type == "editor" || $field->type == "text"){
                $collection = new PageCollection();

                $collection->entity_id  = $entity->id;
                $collection->field_id = $field->id;
                $collection->field_name = $field->name;
                $collection->field_type = $field->type;
                $collection->value =  array_map(function($value) {return $value === null ? "" : $value;}, $request->input($field->name));

                $collection->save();
                $editorObject = [];
            }
            else if($field->type == "file"){

                if($request->file($field->name) != null) {
                    $getimageName = $field->id . time() . '.' . $request->file($field->name)->getClientOriginalExtension();
                    $request->file($field->name)->move(public_path('img/manjakos'), $getimageName);
                    $collection = new PageCollection();

                    $collection->entity_id  = $entity->id;
                    $collection->field_id = $field->id;
                    $collection->field_name = $field->name;
                    $collection->field_type = $field->type;
                    $collection->value =  $getimageName;

                    $collection->save();
                }else {

                    $collection = new PageCollection();

                    $collection->entity_id = $entity->id;
                    $collection->field_id = $field->id;
                    $collection->field_name = $field->name;
                    $collection->field_type = $field->type;
                    $collection->value = null;

                    $collection->save();
                }
            }else if($field->type == "gallery" && $request->file($field->name) != null){
                $collection = new PageCollection();
                $collection->entity_id  = $entity->id;
                $collection->field_id = $field->id;
                $collection->field_name = $field->name;
                $collection->field_type = $field->type;
                $collection->value = $field->model;
                $collection->save();

                $entityGallery = new PageEntityGallery();
                $entityGallery->entity_id = $entity->id;
                $entityGallery->field_id = $field->id;
                $entityGallery->save();

                if($request->file($field->name) != null) {
                    $index = 1;
                    foreach ($request->file($field->name) as $file) {
                        $getimageName = $index . md5(time()) . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('img/manjakos'), $getimageName);

                        $images = new PageGalleryImages();
                        $images->gallery_id = $entityGallery->id;
                        $images->image = $getimageName;
                        $images->order = $index;
                        $images->save();
                        $index += 1;
                    }
                }
            }
            else{

                $collection = new PageCollection();

                $collection->entity_id  = $entity->id;
                $collection->field_id = $field->id;
                $collection->field_name = $field->name;
                $collection->field_type = $field->type;
                $collection->value = $request->input($field->name);

                $collection->save();
            }

        }

        return $this->getEntityById($entity->id, $entity->type_id);
    }

    public function updateManyEntities(Request $request, $entityId){

        $entity = PageEntity::where('id', $entityId)->first();

        $collections = PageCollection::with('field')->where('entity_id', $entityId)->get();


        foreach ($collections as $collection){

            if($collection->field->slugable == true){
                $coll = PageCollection::find($collection->id);
                $entity->update(['slugable' => array_map(function($value) {return str_slug($value, '-');}, $request->input($collection->field_name))]);
                $coll->update(['value' => array_map(function($value) {return $value === null ? "" : $value;}, $request->input($collection->field_name))]);
            }


            if($collection->field_type == "editor" || $collection->field_type == "text"){

                $coll = PageCollection::find($collection->id);
                $coll->update(['value' => array_map(function($value) {return $value === null ? "" : $value;}, $request->input($collection->field_name))]);
            }
            else if($collection->field_type == "file" && $request->file($collection->field_name) != null){

                $getimageName = $collection->id.time().'.'.$request->file($collection->field_name)->getClientOriginalExtension();
                $request->file($collection->field_name)->move(public_path('img/manjakos'), $getimageName);

                $coll = PageCollection::find($collection->id);
                $coll->update(['value' => $getimageName]);
            }else if($collection->field_type == "gallery" && $request->file($collection->field_name) != null){

                $gallery = PageEntityGallery::where('entity_id', $collection->entity_id)->where('field_id', $collection->field_id)->first();

                $lastOrder = PageGalleryImages::where('gallery_id', $gallery->id)->orderBy('order', 'desc')->first();
                if($lastOrder == null){
                    $ltOrder = 1;
                }else{
                    $ltOrder = $lastOrder->order + 1;
                }


                $index = 0;
                foreach ($request->file($collection->field_name) as $file){
                    $getimageName = $index.md5(time()).$collection->field_id.time().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('img/manjakos'), $getimageName);

                    $images = new PageGalleryImages();
                    $images->gallery_id = $gallery->id;
                    $images->image = $getimageName;
                    $images->order = $ltOrder;
                    $images->save();

                    $index +=1;
                    $ltOrder +=1;
                }

            }
            else {
                $coll = PageCollection::find($collection->id);
                $coll->update(['value' => $request->input($coll->field_name)]);
            }
        }

        return $this->getEntityById($entity->id, $entity->type_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEntityById($entityId, $typeId)
    {

        $entity = PageEntity::where('id', $entityId)->first();
        $collections = PageCollection::whereHas('entity', function ($q) use ($entityId){
            $q->where('entity_id', $entityId);
        })->get();

        $fields = PageFields::where('page_type_id', $typeId)->get();

        $formPost = $collections->reduce(function ($formPost, $collections) {
            if($collections['field_type'] == "gallery"){
                $gallery = PageEntityGallery::with(['images' => function ($query) {
                    $query->orderBy('order', 'desc');
                }])->where('field_id', $collections['field_id'])->where('entity_id', $collections['entity_id'])->first();
                if(isset($gallery->images)){$formPost[$collections['field_name']] = $gallery->images;}
                else{$formPost[$collections['field_name']] = $collections['field_type'];}
                return $formPost;
            }
            $formPost[$collections['field_name']] = $collections['value'];
            return $formPost;
        }, []);

        return array('form' => $formPost, 'fields' => $fields, 'entity' => $entity);
    }


    public function getAllEntities($typeId)
    {

        $entities = PageEntity::where('type_id', $typeId)->orderBy('order', 'desc')->get();

        return $entities;
    }

    public function destroyImage($imageid){

        $image = PageGalleryImages::find($imageid);
        $image->delete();
    }

    public function destroyEntity($entityId){

        $entity = PageEntity::where('id', $entityId)->first();

        $entity->delete();
    }


    public function reorder(Request $request, $typeId){

        $entities = PageEntity::where("type_id", $typeId)->get();
        $reorder = array_reverse($request->json('entities'));

        foreach ($entities as $entity) {
            foreach ($reorder as $key => $value) {
                if($value['id'] == $entity->id) {
                    $entity->update(['order' => $key + 1]);
                }
            }
        }

        return $this->getAllEntities($typeId);


    }

    public function reorderImages(Request $request, $typeId, $entityId){

         if ($entityId != "null") {
             $images = PageGalleryImages::whereHas('entity', function($q) use($entityId){
                 $q->where('entity_id', $entityId);
             })->get();
             $reorder = array_reverse($request->json('images'));

             foreach ($images as $image) {
                 foreach ($reorder as $key => $value) {
                     if($value['id'] == $image->id) {
                         $image->update(['order' => $key + 1]);
                     }
                 }
             }
         }
         else
         {
            $entity = PageEntity::where('type_id', $typeId)->first();
            $images = PageGalleryImages::whereHas('entity', function($q) use($entity){
                $q->where('entity_id', $entity->id);
            })->get();


            $reorder = array_reverse($request->json('images'));

            foreach ($images as $image) {
                foreach ($reorder as $key => $value) {
                    if($value['id'] == $image->id) {
                        $image->update(['order' => $key + 1]);
                    }
                }
            }
         }


    }
}