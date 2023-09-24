<?php

namespace App\Http\Controllers;

use App\Entities\PageType;
use App\Entities\PageFields;
use Illuminate\Http\Request;
use Validator;

class PageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = PageType::with('page')->get();

        return $pages;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFields($slug)
    {
        $pageType = PageType::where('slug', $slug)->first();
        $fields = PageFields::where('page_type_id', $pageType->id)->get();

        $formPost = $fields->reduce(function ($formPost, $fields) {

            $formPost[$fields['name']] = $fields['model'];

            return $formPost;
        }, []);


        return array('form' => $formPost, 'fields' => $fields);
    }

    public function showCategories($id) {
        $page = PageType::with('categories')->find($id);

        return $page;
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
            'slug' => 'required|max:255',
        ]);

        if ($validator->passes()){

            $page = new PageType();

            $page->name = $request->input('name');
            $page->slug = $request->input('slug');
            $page->type = $request->input('type');
            $page->page_id = $request->input('page_id');

            $page->save();            

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
        $page = PageType::with(array('fields', 'categories'))->find($id);

        return $page;
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
