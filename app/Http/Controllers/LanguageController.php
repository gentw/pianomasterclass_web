<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Language;
use Validator;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::orderBy('order', 'asc')->get();

        return $languages;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastOrder = Language::orderBy('order', 'desc')->first();

        $validator = Validator::make($request->all(), [
            'key' => 'required|unique:cms_languages|max:255',
            'name' => 'required',
        ]);

        if ($validator->passes()){

            $language = new Language();

            $language->key = $request->input('key');
            $language->name = $request->input('name');
            $language->order = $lastOrder->order + 1;

            $language->save();

            return $language;
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
        $language = Language::find($id);

        return $language;
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
            'key' => 'required|unique:cms_languages|max:255',
            'name' => 'required',
        ]);

        if ($validator->passes()){

            $language = Language::find($id);

            $language->key = $request->input('key');
            $language->name = $request->input('name');

            $language->update();

            return $language;
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
        $language = Language::find($id);

        $language->delete();
    }

    public function reorder(Request $request){

        $reorder = $request->json('languages');

        $languages = Language::get();

        foreach ($languages as $language) {
            foreach ($reorder as $key => $value) {
                if($value['id'] == $language->id) {
                    $language->update(['order' => $key]);

                }
            }


        }

        return $this->index();
    }
}