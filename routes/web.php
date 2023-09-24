<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Validator;



// LOGIN ROUTES
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'AuthController@authenticate']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
Route::post('send/mail', 'MailController@sendMail');










// ADMIN ROUTES
Route::group(['middleware' => ['auth']], function () {

    Route::post('api/reorder/images/{typeId}/{entityId}', 'PageEntityController@reorderImages');

    Route::get('/ctrl/dashboard', function () {
        return view('admin.dashboard');
    });

    //Language CRUD

    Route::get('api/languages', 'LanguageController@index');
    Route::get('api/languages/{id}', 'LanguageController@show');
    Route::post('api/languages', 'LanguageController@store');
    Route::post('api/languages/{id}', 'LanguageController@update');
    Route::delete('api/languages/{id}', 'LanguageController@destroy');
    Route::post('api/reorder/languages', 'LanguageController@reorder');

    // Pages





    //Users
    Route::get('ctrl/api/users', 'UserController@index');
    Route::get('ctrl/api/users/{id}', 'UserController@show');
    Route::post('ctrl/api/users/post', 'UserController@store');
    Route::post('ctrl/api/users/update/{id}', 'UserController@update');
    Route::delete('ctrl/api/users/delete/{id}', 'UserController@destroy');

    Route::get('api/entities/{typeId}', 'PageEntityController@getAllEntities');
    Route::get('api/entities/show/{entityId}/{typeId}', 'PageEntityController@getEntityById');
    Route::post('api/entities/update/{entityId}', 'PageEntityController@updateManyEntities');
    Route::delete('api/entities/delete/{entityId}', 'PageEntityController@destroyEntity');
    Route::post('api/reorder/entities/{typeId}', 'PageEntityController@reorder');

    // For categories of post types
    Route::get('api/pages/types/categories/show/{id}', 'PageTypeCategoryController@show');
    Route::get('/api/pages/types/categories/{id}', 'PageTypeController@showCategories');
    Route::post('api/pages/types/categories', 'PageTypeCategoryController@store');    
    Route::post('api/pages/types/categories/{id}', 'PageTypeCategoryController@update');
    Route::delete('api/pages/types/categories/{id}', 'PageTypeCategoryController@destroy');


    Route::get('api/pages/type/categories/count/{id}', 'PageTypeCategoryController@getCategoryCountForPageType');
    Route::post('api/pages/type/categories/createcategoryfield', 'PageTypeCategoryController@createCategoryField');



    Route::get('api/pages/types', 'PageTypeController@index');
    Route::get('api/pages/types/{id}', 'PageTypeController@show');
    Route::post('api/pages/types', 'PageTypeController@store');
    //
    
    Route::post('api/pages/types/{id}', 'PageTypeController@update');
    Route::delete('api/pages/types/{id}', 'PageTypeController@destroy');


    // Page types relation



    

    Route::get('api/pages/fields', 'PageFieldController@index');
    Route::get('api/pages/fields/{id}', 'PageFieldController@show');
    Route::post('api/pages/fields', 'PageFieldController@store');
    Route::post('api/pages/fields/{id}', 'PageFieldController@update');
    Route::delete('api/pages/fields/{id}', 'PageFieldController@destroy');

    Route::get('api/get/fields/{id}', 'PageEntityController@getEntity');


    // Extra
    



    // Pages

    Route::get('api/pages/entities', 'PageEntityController@index');
    Route::get('api/pages', 'PageController@index');
    Route::get('api/pages/all', 'PageController@getAllPages');
    Route::get('api/pages/{id}', 'PageController@show');
    Route::post('api/pages', 'PageController@store');
    Route::post('api/pages/{id}', 'PageController@update');
    Route::delete('api/pages/{id}', 'PageController@destroy');
    Route::get('api/get/types/{slug}', 'PageController@getPageType');

    //Delete Image
    Route::delete('api/images/{id}', 'PageEntityController@destroyImage');




    Route::post('api/pages/entities/{slug}', 'PageEntityController@store');

   // Route::resource('admin/events', 'EventController');

    Route::resource('admin/events', 'EventController');




});

Route::get('/api/rels', 'PageTypeRelationController@index');
Route::post('/api/rels', 'PageTypeRelationController@store');
Route::post('/api/rels/createrelfield', 'PageTypeRelationController@createRelField');
Route::get('/api/rels/{id}', 'PageTypeRelationController@showRelationsByPostId');

// Website Controller
Route::post('/websites/api/global', 'WebsiteController@globalRequest');
Route::get('/websites/api/pages', 'WebsiteController@pages');
Route::get('/websites/api/languages', 'LanguageController@index');
Route::get('/websites/api/modules/{pageSlug}', 'WebsiteController@modules');
Route::get('/test', 'WebsiteController@coll');
Route::get('api/module/latest/modules/{prefix}', 'WebsiteController@latestModules');
Route::get('/x/rels/{id}', 'WebsiteController@testRel');


// Vue js route logic
Route::get('ctrl/{vue_capture?}', function () {

    $user = \Auth::user();

    if($user!= null){
        return redirect('ctrl/dashboard');
    }
    else{
        return redirect('login');
    }
})->where('vue_capture','[\/\w\.-]*');

// WEBSITE ROUTES
//Route::get('/{vue_capture?}', function () {
//    return view('index');
//})->where('vue_capture', '[\/\w\.-]*');

// Blade Views
/*Route::get('/', function () {
    return redirect('/home');
});*/

// Route::post('/websites/api/upcomingevents', 'WebsiteController@getUpcomingEvents');


// Route::post('/websites/api/home-events', 'WebsiteController@homeEvents');
Route::post("/send_mail", 'WebsiteController@sendMail');

Route::post('/websites/api/programs', 'WebsiteController@getPrograms');




//Route::get('/{slug?}', 'WebsiteController@bladePageRedirect');
//Route::get('/{slug}/{id}/{slugable}', 'WebsiteController@bladePageDetails');

Route::get('/{slug?}/{lang?}', 'WebsiteController@bladePageRedirect');
Route::get('/{slug}/{id}/{slugable}/{lang?}', 'WebsiteController@bladePageDetails');

//Route::post('/event/store', 'EventController@store');


Route::post('/web/events', 'EventController@store');



