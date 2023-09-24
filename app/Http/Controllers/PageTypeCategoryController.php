<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Entities\PageTypeCategory;

use Validator;

class PageTypeCategoryController extends Controller
{

    

   	public function store(Request $request) {
   		$validator = Validator::make($request->all(), [
   			'name' => 'required',
   			'description' => 'required',
   			'type_id' => 'required'
   		]);

   		if($validator->passes()) {
   			$category = new PageTypeCategory();

   			$category->name = $request->input('name');
   			$category->description = $request->input('description');
   			$category->slug = str_slug($request->input('name')['en'], '-');
   			$category->type_id = $request->input('type_id');

   			$category->save();

   			return $category;
   		}
   		
   	}

   	public function show($id)
    {
        $category = PageTypeCategory::find($id);

        return $category;
    }

    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
      ]);

      if($validator->passes()) {
        $category = PageTypeCategory::find($id);

        $category->name = $request->input('name');
        $category->slug = str_slug($request->input('name')['en'], '-');

        $category->update();

        return $category;
      }

    }

    public function destroy($id) {
      $category = PageTypeCategory::find($id);
      $category->delete();
    }

    public function getCategoryCountForPageType($id) {
        $pageType = \App\Entities\PageType::find($id);

        return array('count' => count($pageType->categories), 'type' => $pageType->type);
    } 

    

    public function createCategoryField(Request $request) {
        //after page type creation, immediately create pagetype_category_id field for that pagetype

        $objectLanguage = array();
        $language = \App\Entities\Language::pluck('key')->toArray();
        
        foreach ($language as $key) {
            $objectLanguage[$key] = "";
        }

        $categoryDetails = [
            'label' => 'PageType Category',
            'name'  => 'pagetype_category_id',
            'model' => $objectLanguage,
            'slugable' => 0,
            'type' => 'select',
            'rule' => 'required',
            'page_type_id' => $request->input('type_id')
        ];            
       
        $fields = \App\Entities\PageFields::create($categoryDetails);
         
    }

    
}
