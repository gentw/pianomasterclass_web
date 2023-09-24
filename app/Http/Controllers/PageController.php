<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Page;
use App\Entities\Language;
use Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get()->toHierarchy();

        return $pages;
    }

    public function getAllPages(){
        $pages = Page::get();

        return $pages;
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
            'name' => 'required',
            'slug' => 'required|unique:cms_pages|max:255',
        ]);

        if ($validator->passes()){

            $name = json_encode($request->input('name'), true);
            $array = json_decode($name, true);

            $page = new Page();

            $page->name = $array;
            $page->slug = $request->input('slug');
            $page->save();


            if($request->input('parent_id') != null){

                $pageParent = Page::where('id', $request->input('parent_id'))->first();
                $page->makeChildOf($pageParent);
            }

            return $page;
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

        $object = array();
        $language = Language::pluck('key')->toArray();

        //return $language[0];
        $page = Page::where('id', $id)->pluck('name')->toArray();
 
        $pages = Page::find($id);

        foreach ($language as $key) {
            if (array_key_exists($key, $page[0])) {
                
                //array_merge($object, array($key => $pages->name[$key]));
                $object[$key] = $pages->name[$key];
            }
            else{

                $object[$key] = "";


            }
        }

        $pages->name = $object;
        $pages->update(array("name")); 

        return $pages;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPageType($slug)
    {
        $pages = Page::with('types.fields')->where('slug', $slug)->get();

        return $pages;
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

        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->passes()){

            $page = Page::find($id);

            $page->name = $request->input('name');
            $page->slug = $request->input('slug');
            $page->update();


            // if($request->input('parent') != null){

            //     $pageParent = Page::where('id', $request->input('parent'))->first();
            //     $page->makeChildOf($pageParent);
            // }

            return $page;
        }

        return response()->json(["errors" => $validator->messages()], 422);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);

        $page->delete();

    }

}
