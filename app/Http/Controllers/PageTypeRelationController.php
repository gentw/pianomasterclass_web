<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\PageTypeRelation;
use App\Entities\PageType;
use Validator;
use DB;


class PageTypeRelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTypeRel = DB::table('cms_pages_types')
            ->join('cms_pagetype_rel', function($join) {
                $join->on('cms_pages_types.id', '=', 'cms_pagetype_rel.from_id')
                ->orOn('cms_pages_types.id', '=', 'cms_pagetype_rel.to_id');
            })
           
            ->get();

        // $pageTypeRel = DB::table('cms_pagetype_rel')
        //                 ->joinSub($pageTypes, 'page_types', function($join) {
        //                     $join->on('cms_pagetype_rel.from_id', '=', 'page_types.id');
        //                 });

        //$pageTypeRels = PageTypeRelation::get();
        $i=0;
        $j=0;
        $relations = array();
        $pages = json_decode($pageTypeRel, true);

        foreach($pages as $rel) {
            $i++;           

            if($i % 2 != 0 ) {
                $j++;
                $relations[$j] = array();           
            }

            array_push($relations[$j], $rel); 
            
        }
        $relations = array_values($relations);
        return $relations;


       // return $pageTypeRel;

        
    }

    public function createRelField(Request $request) {
        //after page type creation, immediately create pagetype_category_id field for that pagetype

                $objectLanguage = array();
                $language = \App\Entities\Language::pluck('key')->toArray();
                
                foreach ($language as $key) {
                    $objectLanguage[$key] = "";
                }

                $field = \App\Entities\PageType::find($request->input('rel_id'));
                $field_name = $field->name;
                $field_slug = $field->slug;
                $field_rel_type = $request->input('rel_type'); 

                $categoryDetails = [
                    'label' => $field_name . " (".$field_rel_type.")",
                    'name'  => 'pagetype_rel_'.$field_slug,
                    'model' => $objectLanguage,
                    'slugable' => 0,
                    'type' => 'select',
                    'rule' => 'required',
                    'page_type_id' => $request->input('type_id')
                ];            
               
                $fields = \App\Entities\PageFields::create($categoryDetails);
         
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
        $validator = Validator::make($request->all(), [
            'from_id' => 'required',
            'to_id' => 'required',
            'type' => 'required',
        ]);

        if($validator->passes()) {
            $pageTypeRel = new PageTypeRelation();

            $pageTypeRel->from_id = $request->input('from_id');
            $pageTypeRel->to_id = $request->input('to_id');
            $pageTypeRel->type = $request->input('type');

            $pageTypeRel->save();

            return $pageTypeRel;
        }
        return response()->json(["errors" => $validator->messages()], 422);
    }

    public function showRelationsByPostId($id) {

        // find rels
        $pageTypes = array();
        $rels = DB::table('cms_pagetype_rel')->where('from_id', $id)->get();
        
        foreach($rels as $rel) {

        $to_id = $rel->to_id;
        $pageType = PageType::with(['entities' => function ($query){

                
                $query->orderBy('order', 'desc');            
                $query->select('id', 'slugable', 'type_id');            
                     

           
        }, 'entities.collections' => function ($query) {
                $query->select(['entity_id', 'value', 'field_name', 'field_type', 'field_id']);
            }])->find($to_id);
        array_push($pageTypes, $pageType);
        }

        $titles = array();
        for($i=0; $i<sizeof($pageTypes); $i++) {
            $titles[$pageTypes[$i]["name"]] = array();
            $entities = sizeof($pageTypes[$i]['entities']);

            for($j=0; $j<$entities; $j++) {
                $title = $pageTypes[$i]['entities'][$j]['collections'][0]['value'];

                array_push($titles[$pageTypes[$i]["name"]], $title);
            } 
            
        }

        return $titles;        

        
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
