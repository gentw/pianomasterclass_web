<?php

namespace App\Http\Controllers;

use App\Entities\PageCollection;
use App\Entities\PageEntity;
use App\Entities\PageEntityGallery;
use App\Entities\PageFields;
use Illuminate\Http\Request;
use Validator;
use App\Entities\Language;

class PageFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = PageFields::get();

        return $fields;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $objectLanguage = array();
        $language = Language::pluck('key')->toArray();



        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'label' => 'required|max:255',
        ]);

        if ($validator->passes()){


            $field = new PageFields();

            $field->label = $request->input('label');
            $field->name = $request->input('name');
            $field->type = $request->input('type');
            $field->rule = $request->input('rule');
            $field->slugable = $request->input('slugable');
            $field->page_type_id = $request->input('page_type_id');

            if($request->input('type') == "text" || $request->input('type') == "editor"){

                foreach ($language as $key) {
                    $objectLanguage[$key] = "";
                }

                $field->model = $objectLanguage;


            }else{
                $field->model = $request->input('name');
            }

            $field->save();

            $entities = PageEntity::where('type_id', $request->input('page_type_id'))->get();

            if ($entities != null){
                foreach ($entities as $entity){

                    $collection = new PageCollection();
                    $collection->entity_id  = $entity->id;
                    $collection->field_id = $field->id;
                    $collection->field_name = $field->name;
                    $collection->field_type = $field->type;
                    $collection->value = $field->model;
                    $collection->save();

                    if($collection->field_type == "gallery"){
                        $entityGallery = new PageEntityGallery();
                        $entityGallery->entity_id = $entity->id;
                        $entityGallery->field_id = $field->id;
                        $entityGallery->save();
                    }
                }

            }

            return $field;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}