<?php

namespace App\Http\Controllers;

use App\Entities\PageEntity;
use App\Entities\PageType;
use App\Entities\Page;
use App\Entities\UploadFile;
use Illuminate\Http\Request;
use App\Entities\PageEntityGallery;
use App\Services\AfrikaEventService;

use function PHPSTORM_META\map;
use DB;
use Validator;
use Mail;


class WebsiteController extends Controller
{
    /**
     * Get Pages structure
     *
     * @return mixed
     */


    protected $afrika;
    public function __construct(AfrikaEventService $service) {
        $this->afrika = $service;

    }
    /**
     * Get Pages structure
     *
     * @return mixed
     */
    public function pages(){

        $pages = Page::get()->toHierarchy();

        return $pages;
    }

    public function testRel($id) {

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
                $title = $pageTypes[$i]['entities'][$j]['collections'][0]['value']['en'];

                array_push($titles[$pageTypes[$i]["name"]], $title);
            } 
            
        }

        return $titles;
        

        
    }

    public function getPrograms(Request $request) {
        $r = $request->input('global');

        $many = array();
        $programs = array();

        foreach ($r as $key => $value) {
            $pageType = PageType::with(['entities' => function ($query) use ($value) {
                $query->orderBy('order', 'desc');
                $query->select('id', 'slugable', 'type_id');
                if($value['limit'] != "all") {
                    $query->limit($value['limit']);
                }
            }, 'entities.collections' => function ($query) {
                $query->select(['entity_id', 'value', 'field_name', 'field_type', 'field_id']);
            }])->where('slug', 'programs')->get(['id', 'name', 'type', 'slug']);
        }


        foreach($pageType as $key => $value) {
            foreach($value->entities as $entity) {
                $coll = $entity->collections;
                
                $formPost = $coll->reduce(function ($formPost, $coll) {

                    $formPost[$coll['field_name']] = $coll['value'];
                    
                    
                    return $formPost;
                }, []);

                

                // if($price)

                array_push($many, ["id" => $entity->id, 'slugable' => $entity->slugable, 'collections' => $formPost]);     
                                
            }
        }

        // change order by price
        // usort($many, function ($item1, $item2) {
        //     return (float)$item1['collections']['price']['en'] <=> (float)$item2['collections']['price']['en'];
        // });





        for($i=0; $i<count($many); $i++) {           

            foreach($r as $key => $value) {    

                

                // if specific category with price and without price
               
                if($value['category'] != null) {

                    // if 1 category specified, no multiple
                    if(!is_array($value['category'])) {
                        if($many[$i]['collections']['pagetype_category_id'] === $value['category']) {

                            
                            if($value['price'] != null) {

                                // 1 price, no multiple
                                if(!is_array($value['price'])) {
                                    $input_price = explode("-", $value['price']);
                                    $input_price_from = (float) $input_price[0] - 0.01;
                                    $input_price_to = (float) $input_price[1] - 0.01;

                                    $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;

                                    if($db_price >= $input_price_from && $db_price <= $input_price_to) {
                                        array_push($programs, $many[$i]);
                                    }
                                } else { // else (multiple prices)
                                    foreach($value['price'] as $value) {
                                        $input_price = explode("-", $value);
                                        $input_price_from = (float) $input_price[0] - 0.01;
                                        $input_price_to = (float) $input_price[1] - 0.01;

                                        $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;


                                        if($db_price >= $input_price_from && $db_price <= $input_price_to) {
                                            array_push($programs, $many[$i]);
                                        }
                                    }

                                }
                            } else {
                                array_push($programs, $many[$i]);
                            }                            
                        }   

                    } else {

                         // multiple categories specified
                        foreach($value['category'] as $category) {                            
                            if($many[$i]['collections']['pagetype_category_id'] === $category) {

                                // price specified
                                if($value['price'] != null) {

                                    // 1 price, no multiple
                                    if(!is_array($value['price'])) {
                                        $input_price = explode("-", $value['price']);
                                        $input_price_from = (float) $input_price[0] - 0.01;
                                        $input_price_to = (float) $input_price[1] - 0.01;

                                        $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;

                                        if($db_price >= $input_price_from && $db_price <= $input_price_to) {
                                            array_push($programs, $many[$i]);
                                        }
                                    } else { // else (multiple prices)
                                        foreach($value['price'] as $value) {
                                            $input_price = explode("-", $value);
                                            $input_price_from = (float) $input_price[0] - 0.01;
                                            $input_price_to = (float) $input_price[1] - 0.01;

                                            $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;


                                            if($db_price >= $input_price_from && $db_price <= $input_price_to) {
                                                array_push($programs, $many[$i]);
                                            }
                                        }

                                    }
                                } else { // multiple categories without price
                                    array_push($programs, $many[$i]);
                                }                            
                            } // end if
                        } // end foreach
                    }
                } else {

                    if($value['price'] != null) {

                        if(!is_array($value['price'])){
                            $input_price = explode("-", $value['price']);
                            $input_price_from = (float) $input_price[0] - 0.01;
                            $input_price_to = (float) $input_price[1] - 0.01;

                            $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;

                            if($db_price >= $input_price_from && $db_price <= $input_price_to) {
                                array_push($programs, $many[$i]);
                            }
                        } else {
                            foreach($value['price'] as $value) {
                                $input_price = explode("-", $value);
                                $input_price_from = (float) $input_price[0] - 0.01;
                                $input_price_to = (float) $input_price[1] - 0.01;

                                $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;


                                if($db_price >= $input_price_from && $db_price <= $input_price_to) {
                                    array_push($programs, $many[$i]);
                                }
                            }
                        }
                    }

                }

                // if selected multiple categories with one price and no price
               /* if(is_array($value['category']) && !is_array($value['price']) && $value['category'] != null) {
                        foreach($value['category'] as $category) {
                            if($many[$i]['collections']['pagetype_category_id'] == $category) {
                                if($value['price'] != null) {
                                    $input_price = explode("-", $value['price']);
                                    $input_price_from = (float) $input_price[0] - 0.01;
                                    $input_price_to = (float) $input_price[1] - 0.01;

                                    $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;

                                    if($input_price_from <= $db_price || $input_price_to == $db_price) {
                                        array_push($programs, $many[$i]);
                                    }
                                } else {
                                    array_push($programs, $many[$i]);
                                }

                                //
                            }
                        }                   
                }*/
                

                // if selected one price without category                
                /*if(!is_array($value['price']) && $value['price'] != null && $value['category'] == null && !is_array($value['category'])) {
                    $input_price = explode("-", $value['price']);
                    $input_price_from = (float) $input_price[0] - 0.01;
                    $input_price_to = (float) $input_price[1] - 0.01;

                    $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;

                    if($db_price >= $input_price_from && $db_price <= $input_price_to) {
                        array_push($programs, $many[$i]);
                    }
                } */
               


                

                // if selected multiple prices without categories
               
                /*if(is_array($value['price']) && $value['category'] == null && !is_array($value['category'])) {

                    foreach ($value['price'] as $value) {
                        
                        $input_price = explode("-", $value);
                        $input_price_from = (float) $input_price[0] - 0.01;
                        $input_price_to = (float) $input_price[1] - 0.01;

                        $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;


                        if($db_price >= $input_price_from && $db_price <= $input_price_to) {
                            array_push($programs, $many[$i]);
                        }
                   }                  
                    
                } */

                 // if selected multiple prices with single category
               /* if(is_array($value['price']) && $value['category'] != null && !is_array($value['category'])) {

                    if($many[$i]['collections']['pagetype_category_id'] == $value['category']) {

                        foreach ($value['price'] as $value) {
                            
                            $input_price = explode("-", $value);
                            $input_price_from = (float) $input_price[0] - 0.01;
                            $input_price_to = (float) $input_price[1] - 0.01;

                            $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;


                            if($db_price >= $input_price_from && $db_price <= $input_price_to) {
                                array_push($programs, $many[$i]);
                            }
                        } 
                    }                 
                    
                } */





                // multiple categories , multiple prices
                /*if(is_array($value['price']) && $value['category'] != null && is_array($value['category'])) {

                    foreach($value['category'] as $category) {
                        if($many[$i]['collections']['pagetype_category_id'] == $category) {
                            foreach ($value['price'] as $value) {
                                
                                $input_price = explode("-", $value);
                                $input_price_from = (float) $input_price[0] - 0.01;
                                $input_price_to = (float) $input_price[1] - 0.01;

                                $db_price = (float) $many[$i]['collections']['price']['en'] - 0.01;


                                if($db_price >= $input_price_from && $db_price <= $input_price_to) {
                                    array_push($programs, $many[$i]);
                                }
                           }
                       }   //end if       
                   }        
                    
                } */



                
            }
        } 
        
        return $programs;
        


        /*foreach ($request->input('global') as $key => $value){
            $pageType = PageType::with(['entities' => function ($query) use ($value) {
                $query->orderBy('order', 'desc');
                $query->select(['id', 'slugable', 'type_id']);
                if($value['limit'] != "all"){
                    $query->limit($value['limit']);
                }
            }, 'entities.collections' => function ($query) {
                $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
            }])->where('slug' , $value['type'])->get(['id', 'name', 'type', 'slug']);
        }*/

        /*foreach ($pageType as $key => $value){
            
            foreach ($value->entities as $entity) {
                $coll = $entity->collections;
                
                $formPost = $coll->reduce(function ($formPost, $coll) {
                    $formPost[$coll['field_name']] = $coll['value'];
                    
                    return $formPost;

                }, []);

                array_push($many, ["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]);     

            }

        }*/
        // return $pageType;


    }
    

    public function getUpcomingEvents(Request $request) {

        $request->input('global');

        $months = array();
        $dates = array();
        $many = array();
        $index = -1;
        //print_r($request->input('global'));
        // foreach ($request->input('global') as $key => $value){
        //     $pageType = PageType::with(['entities' => function ($query) use ($value) {
        //         $query->orderBy('order', 'desc');
        //         $query->select(['id', 'slugable', 'type_id']);
        //         if($value['limit'] != "all"){
        //             $query->limit($value['limit']);
        //         }

        //     }, 'entities.collections' => function ($query) {
        //         $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
        //     }])->where('slug' , $value['type'])->get(['id', 'name', 'type', 'slug']);
        // }

        // $m = array();

        foreach ($request->input('global') as $key => $value){
            $pageType = PageType::with(['entities' => function ($query) use ($value) {
                $query->orderBy('order', 'desc');
                $query->select(['id', 'slugable', 'type_id']);
                if($value['limit'] != "all"){
                    $query->limit($value['limit']);
                }
            }, 'entities.collections' => function ($query) {
                $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
            }])->where('slug' , $value['type'])->get(['id', 'name', 'type', 'slug']);
        }

        // $show ? upcoming_events or past_events
        $show = $request->input('global')[0]['show'];

        


        foreach ($pageType as $key => $value){
            // $index += 1;
            // $newObject = array($value->slug => []);
            // array_push($many, $newObject);


            $months_before['start_date'] = array();
            $months_before['end_date'] = array();
            foreach ($value->entities as $entity) {
                $coll = $entity->collections;
                
                $formPost = $coll->reduce(function ($formPost, $coll) {
                    $formPost[$coll['field_name']] = $coll['value'];
                    
                    return $formPost;

                }, []);

            
                $dates = ['start_date', 'end_date'];
               

                $checkDate = null;
                for($i=0; $i < count($dates); $i++) {
                    $date = explode(" ", $formPost[$dates[$i]]);

                    $date = $date[1] . " " . $date[2] . " " . $date[3];
                    $d = $this->afrika->changeDateFormat($date); // change format => ex: May 2019

                    // if bug happens
                    // foreach($months_before as $key => $value) {
                    //     if($key == 'start_date') {
                    //         if($d != $value)
                    //             
                    //     }
                    // } 

                    array_push($months_before[$dates[$i]], $d);   

                }

                
                
                $period = $this->afrika->tripiPerDateRange($months_before['start_date'][0], $months_before['end_date'][0]);
                $result = [];
     
                foreach($period as $month){
                     $result =  $month->format("F Y") ;
                     
                     
                    array_push($months, $result);
                }

                $months_before['start_date'] = array();
                $months_before['end_date'] = array();


                array_push($many, ["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]);     

                //["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]      
                // array_push($many[$index][$value->slug], ["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]);     

            }



            


    }

   

        

        usort($months, array($this->afrika, 'sortMonths'));


            $months = array_unique($months);

            //after call unique
            $monthsUnique = array();
            foreach($months as $value) {                             

                $months = $value;         
                array_push($monthsUnique, $value);
            }


        
             

        //print_r($many[0]['end_date']);

        //insert on array only upcoming event date
        foreach($monthsUnique as $month) {
            $m = strtotime($month);
            $now = date("F Y");
            $date=date_create($now);
            $date = date_modify($date,"-1 month");
            $now= date_format($date,"F Y");

            if($show == "upcoming_events") {
                if(strtotime($now) < $m) {
                    $event[$month] = array();   
                }                     
            } else {
                if(strtotime($now) >= $m) {
                    $event[$month] = array();   
                } 
            }
        }


        foreach($many as $key => $m) {
            $start_date = explode(" ", $m['collections']['start_date']);
            $start_date = $start_date[1] . " " . $start_date[3];

            $start_date = $this->afrika->changeDateFormat($start_date);

            
            $end_date = explode(" ", $m['collections']['end_date']);
            $end_date = $end_date[1] . " " . $end_date[3];

            $end_date = $this->afrika->changeDateFormat($end_date);
            

            // Make Past events unavailable
            $s_date = explode(" ", $m['collections']['start_date']);
            $m['collections']['start_date'] = $s_date[2] . ' ' . $s_date[1] . ' ' . $s_date[3];
            $s_date = strtotime($m['collections']['start_date']);


            // end date
            $e_date = explode(" ", $m['collections']['end_date']);
            $m['collections']['end_date'] = $e_date[2] . ' ' . $e_date[1] . ' ' . $e_date[3];
            $e_date = strtotime($m['collections']['end_date']);
            $now = strtotime(date("d M Y"));


                     
    
            $daterange = $this->afrika->tripiPerDateRange($start_date, $end_date);

            $result = [];

            foreach($daterange as $date){
                $result =  $date->format("F Y") ;

                foreach($monthsUnique as $month) {

                    if($show == "upcoming_events") {

                        if($result == $month && $now < $e_date) {
                            if(array_key_exists($month, $event)) {
                                array_push($event[$month], 

                                [
                                    "collections" => $m['collections'], 
                                    "slugable" => $m['slugable']
                                ]);
                            } 
                        } 
                    } else {
                        if($result == $month && $now >= $e_date) {
                            if(array_key_exists($month, $event)) {
                                array_push($event[$month], ["collections" => $m['collections'], "slugable" => $m['slugable']]);
                            } 
                        } 
                    }

                }    
            }
          
        }
      
        

        $global = array(
            "upcoming_events" => $monthsUnique,
        );



        return array("events" => $event);
    }

    public function homeEvents(Request $request) {
        $request->input('global');

        $many = array();

        foreach ($request->input('global') as $key => $value){
            $pageType = PageType::with(['entities' => function ($query) use ($value) {
                $query->orderBy('order', 'desc');
                $query->select(['id', 'slugable', 'type_id']);
                if($value['limit'] != "all"){
                    $query->limit($value['limit']);
                }
            }, 'entities.collections' => function ($query) {
                $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
            }])->where('slug' , $value['type'])->get(['id', 'name', 'type', 'slug']);
        }

        // $show ? upcoming_events or past_events
        $show = $request->input('global')[0]['show'];

        foreach ($pageType as $key => $value){
           
            foreach ($value->entities as $entity) {
                $coll = $entity->collections;
                
                $formPost = $coll->reduce(function ($formPost, $coll) {
                    $formPost[$coll['field_name']] = $coll['value'];
                    
                    return $formPost;

                }, []);



                $e_date = explode(" ", $formPost['end_date']);
                $formPost['end_date'] = $e_date[2] . ' ' . $e_date[1] . ' ' . $e_date[3];
                $e_date = strtotime($formPost['end_date']);

                $now = strtotime(date("d M Y"));

                if($show == "upcoming_events") {
                    if($now < $e_date) {
                        array_push($many, ["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]);   
                    }
                } else {
                    if($now >= $e_date) {
                        array_push($many, ["id" => $entity->id, "slugable" => $entity->slugable, "collections" => $formPost]);   
                    }
                }               

            }
        }
        return array("events" => $many);
    }


    public function globalRequest (Request $request){
       

        $one = array();
        $many = array();

        $index = -1;
        foreach ($request->input('global') as $key => $value){
            $pageType = PageType::with(['entities' => function ($query) use ($value) {
                $query->orderBy('order', 'asc');
                $query->select(['id', 'slugable', 'type_id', 'created_at']);
                if($value['limit'] != "all"){
                    $query->limit($value['limit']);
                }

            }, 'entities.collections' => function ($query) {
                $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
            }])->where('slug' , $value['type'])->get(['id', 'name', 'type', 'slug']);
            
            // for upcoming events
            global $for;
            if(isset($value['for'])) {
                if($value['for'] == "upcoming_events") {
                    $for = "upcoming_events";
                } else if($value['for'] == "past_events") {
                    $for = "past_events";
                } else if($value['for'] == "latest_news") { //for latest news in single page
                    $for = "latest_news";
                    $currentNewsId = $value['current_news_id'];
                }
            }

           
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
                    if($for == "upcoming_events") {                        
                        $newObject = array("upcoming_events" => []);
                    } else if($for == "past_events") {
                        $newObject = array("past_events" => []);
                    } else if($for == "latest_news") {

                        $newObject = array("latest_news" => []);
                    } else { 
                        $newObject = array($value->slug => []);
                    }
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


                        $created_at = strftime("%d %m %Y", strtotime($entity->created_at));

                        $date_in_array = explode(" ", $created_at);

                        $months = array("Janar", "Shkurt", "Mars", "Prill", "Maj", "Qershor", "Korrik", "Gusht", "Shtator", "Tetor", "Nentor", "Dhjetor");

                        $month = (int)$date_in_array[1];
                        $date_in_array[1] = $months[--$month];                     

                        $created_at = implode(" ",$date_in_array);

                        


                        // for upcoming events

                        if(isset($for)) {
                            if($for == "upcoming_events") {
                                //$event_date = strtotime(date("d F Y", strtotime($formPost['date']))); 
                                $event_date = explode(" ", $formPost['date']);
                                $event_date =  $event_date[2] . " " . $event_date[1] . " " . $event_date[3];
                                $event_date = strtotime($event_date);                     
                                $current_date = strtotime(date("d F Y"));
                                 
                                 if($current_date < $event_date) {

                                    if(isset($formPost['date'])) {
                                        $event_date = explode(" ", $formPost['date']);
                                        
                                        // per mi kthy shqip muajin
                                        $d = $event_date[2] . "-" . $event_date[1];
                                        
                                        $event_date = strftime("%d %m", strtotime($d));

                                       
                                        $date_in_array = explode(" ", $event_date);



                                        $months = array("Jan", "Shku", "Mar", "Pri", "Maj", "Qer", "Korr", "Gush", "Shta", "Tet", "Nen", "Dhje");

                                        $month = (int)$date_in_array[1];
                                        $date_in_array[1] = $months[--$month];                     

                                        $formPost['date'] = array("day"=>$date_in_array[0], "month" => $date_in_array[1]);

                                       


                                        // per mi kthy shqip muajin
                                        $d = $event_date[2] . "-" . $event_date[1] . "-" . $event_date[3];
                                        
                                        $event_full_date = strftime("%d %m %Y", strtotime($d));

                                       
                                        $date_in_array = explode(" ", $event_full_date);



                                        $months = array("Janar", "Shkurt", "Mars", "Prill", "Maj", "Qershor", "Korrik", "Gusht", "Shtator", "Tetor", "Nentor", "Dhjetor");

                                        $month = (int)$date_in_array[1];
                                        $date_in_array[1] = $months[--$month];                     

                                        $event_full_date = implode(" ",$date_in_array);



                                        $formPost['full_date'] = $event_full_date;

                                       

                                        array_push($many[$index]["upcoming_events"], ["id" => $entity->id, "slugable" => $entity->slugable, "created_at" => $created_at, "collections" => $formPost]);
                                    }                                    
                                 }
                            } else if($for == "past_events") {
                                $event_date = explode(" ", $formPost['date']);
                                $event_date =  $event_date[2] . " " . $event_date[1] . " " . $event_date[3];
                                $event_date = strtotime($event_date);                     
                                $current_date = strtotime(date("d F Y"));
                                 
                                 if($current_date > $event_date) {

                                    if(isset($formPost['date'])) {
                                        $event_date = explode(" ", $formPost['date']);
                                        
                                        // per mi kthy shqip muajin
                                        $d = $event_date[2] . "-" . $event_date[1];
                                        
                                        $event_date = strftime("%d %m", strtotime($d));

                                       
                                        $date_in_array = explode(" ", $event_date);



                                        $months = array("Jan", "Shku", "Mar", "Pri", "Maj", "Qer", "Korr", "Gush", "Shta", "Tet", "Nen", "Dhje");

                                        $month = (int)$date_in_array[1];
                                        $date_in_array[1] = $months[--$month];                     

                                        $formPost['date'] = array("day"=>$date_in_array[0], "month" => $date_in_array[1]);

                                                                               

                                        array_push($many[$index]["past_events"], ["id" => $entity->id, "slugable" => $entity->slugable, "created_at" => $created_at, "collections" => $formPost]);
                                    }                                    
                                 }
                            } else if($for == "latest_news") {
                                if($entity->id != $currentNewsId) {
                                    array_push($many[$index]["latest_news"], ["id" => $entity->id, "slugable" => $entity->slugable, "created_at" => $created_at, "collections" => $formPost]);
                                }
                            } 
                        } else { 
                            array_push($many[$index][$value->slug], ["id" => $entity->id, "slugable" => $entity->slugable, "created_at" => $created_at, "collections" => $formPost]);
                        }


                    }
                }
            }

        }

        $global = array(
            "one" => $one,
            "many" =>$many
        );



        return array("global" => $global);
    }

    /**
     * Get Modules for an Page
     *
     * @param $slug
     * @return array
     */
    public function modules($slug){

        $one = array();
        $many = array();

        $page = Page::where('slug', $slug)->first();

        $pageType = PageType::with(['entities' => function ($query) {
            $query->orderBy('order', 'desc');
            $query->select(['id', 'slugable', 'type_id']);
        }, 'entities.collections' => function ($query) {
            $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
        }])->where('page_id' , $page->id)->get(['id', 'name', 'type', 'slug']);

        $index = -1;
        foreach ($pageType as $key => $value){

            if($value->entities != null && $value->type == 'one') {

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

                $one[$value->slug] = ["collections" => $formPost];
            }else if($value->entities != [] && $value->type = "many"){
                $index += 1;
                $newObject  = array($value->slug => []);
                array_push($many, $newObject);
                foreach ($value->entities as $entity){



                    $coll = $entity->collections;
//
                    $formPost = $coll->reduce(function ($formPost, $coll) {

                        $formPost[$coll['field_name']] = $coll['value'];
                        return $formPost;
                    }, []);


//
                    array_push($many[$index][$value->slug], ["id" => $entity->id, "slugable" =>$entity->slugable, "collections" => $formPost]);


                }

            }

        }

        return array("one" => $one, "many" => $many);
    }

    /*
     * Find Module By Id
     */
    public function moduleById($id, $slug){

        $entityID = array(
            "entity" => []
        );
        $entity = PageEntity::with('collections')->find($id);

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

        array_push($entityID['entity'], ["id" => $entity->id, "slugable" =>$entity->slugable, "collections" => $formPost]);


        return $entityID;
    }

    public function bladePageRedirect($slug = null, $lang = null){
	if(is_null($lang))
	    $lang = "en";

        if($slug == null) {
            $slug = "home";
        }

        $one = array();
        $many = array();
        $page = Page::where('slug', $slug)->first();
        $pageType = PageType::with(['entities' => function ($query) {
            $query->orderBy('order', 'desc');
            $query->select(['id', 'slugable', 'type_id']);
        }, 'entities.collections' => function ($query) {
            $query->select(['entity_id','value', 'field_name', 'field_type', 'field_id']);
            $query->orderBy('id', 'desc');
        }])->where('page_id' , $page->id)->get(['id', 'name', 'type', 'slug']);
        $index = -1;
        foreach ($pageType as $key => $value){
            if($value->entities != null && $value->type == "one") {
                if(isset($value->entities[0])) {
                    $coll = $value->entities[0]->collections;
                    $formPost = $coll->reduce(function ($formPost, $coll) {
                        if ($coll['field_type'] == "gallery") {
                            $gallery = PageEntityGallery::with(['images' => function ($query) {
                                $query->orderBy('order', 'desc');
                            }])->where('field_id', $coll['field_id'])->where('entity_id', $coll['entity_id'])->first();
                            $formPost[$coll['field_name']] = $gallery->images;
                            return $formPost;
                        }
                        $formPost[$coll['field_name']] = $coll['value'];
                        return $formPost;
                    }, []);
                    $one[$value->slug] = ["collections" => $formPost];
                }
            }else if($value->entities != [] && $value->type = "many"){
                $index += 1;
                $newObject  = array($value->slug => []);
                array_push($many, $newObject);
                foreach ($value->entities as $entity){



                    $coll = $entity->collections;
//
                    $formPost = $coll->reduce(function ($formPost, $coll) {
                        $formPost[$coll['field_name']] = $coll['value'];
                        return $formPost;
                    }, []);
//
                    array_push($many[$index][$value->slug], ["id" => $entity->id, "slugable" =>$entity->slugable, "collections" => $formPost]);
                }
            }
        }
     
        

        return view('pages.'.$slug, array('one' => $one, 'many' => $many), compact(['lang', 'slug']));
    }

    public function bladePageDetails($slug, $id, $slugable, $lang = null){

	if(is_null($lang))
		$lang = "en";

        $entityID = array(
            "entity" => []
        );
        $entity = PageEntity::with('collections')->find($id);
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
        $created_at = date("d F", strtotime($entity->created_at));
        array_push($entityID['entity'], ["id" => $entity->id, "created_at" => $created_at, "slugable" =>$entity->slugable, "collections" => $formPost]);

        return view('innerpages.'.$slug, array('entity' => $entityID['entity']), compact(['lang', 'id', 'slug','slugable']));
    }


    public function sendMail(Request $request) {
        if($request['price'] == 'active') {

            $validator1 = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'adresa' => 'required',
                'nr_tel' => 'required',
                'klasa_niveli' => 'required',
                'pedagogu' => 'required',
                'reporteri_plote' => 'required',
                'reporteri_zgjedhur' => 'required',
                'dob_month' => 'required',
                'dob_day' => 'required',
                'dob_year' => 'required',
                'foto' => 'required',
                'cv' => 'required'
            ]);
    
            if($validator1->fails()) {
                return response()->json("GABIM: Ju lutem plotesoni te gjitha fushat e kerkuara!");
            }

            //.DOCX ·.HTML and .HTM ·.ODT ·.PDF ·.XLS and .XLSX
            $validator = Validator::make($request->all(), [
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048',
                'cv' => 'mimes:doc,docx,html,htm,pdf,odt,xlsx,xls,jpeg,png,jpg,gif,svg|max:6048'
            ]);
    
            if(!$validator->fails()) {
                $imageName = time().'.'.$request->foto->getClientOriginalExtension();    
                $request->foto->move(public_path('uploads'), $imageName);

                UploadFile::create(['file_name' => $imageName]);

                $cvName = time().'.'.$request->cv->getClientOriginalExtension();    
                $request->cv->move(public_path('uploads'), $cvName);

                UploadFile::create(['file_name' => $cvName]);
                
                $data = [
                    'fname' => $request['first_name'],
                    'lname' => $request['last_name'],
                    'email' => $request['email'],
                    'adresa' => $request['adresa'], 
                    'nr_tel' => $request['nr_tel'], 
                    'shkolla' => $request['shkolla'], 
                    'klasa_niveli' => $request['klasa_niveli'], 
                    'pedagogu' => $request['pedagogu'], 
                    'reporteri_plote' => $request['reporteri_plote'], 
                    'reporteri_zgjedhur' => $request['reporteri_zgjedhur'], 
                    'dob_month' => $request['dob_month'], 
                    'dob_day' => $request['dob_day'], 
                    'dob_year' => $request['dob_year'], 
                    'foto'=> $imageName,
                    'cv'  => $cvName
                ];

                Mail::send('emails.mail_active', $data, function($message) use ($request) {
                    $message->to('pianomasterclass.ks@gmail.com', 'MasterClass')->subject
                    ('Active Request: ' . $request['first_name'] . ' ' . $request['last_name']);
                });


            } else {
                return response()->json(['error'=>'Perzgjedhja e formatit e gabuar ne Foto ose CV.']);
            }
    
            
       } else {

        $validator1 = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'adresa' => 'required',
            'nr_tel' => 'required',
            'klasa_niveli' => 'required',
            'dob_month' => 'required',
            'dob_day' => 'required',
            'dob_year' => 'required'
        ]);

        if($validator1->fails()) {
            return response()->json("Ju lutem plotesoni te gjitha fushat e kerkuara!");
        }

        $data = [
            'fname' => $request['first_name'],
            'lname' => $request['last_name'],
            'email' => $request['email'],
            'adresa' => $request['adresa'], 
            'nr_tel' => $request['nr_tel'], 
            'shkolla' => $request['shkolla'], 
            'klasa_niveli' => $request['klasa_niveli'], 
            'dob_month' => $request['dob_month'], 
            'dob_day' => $request['dob_day'], 
            'dob_year' => $request['dob_year'], 
        ];

        Mail::send('emails.mail_passive', $data, function($message) use ($request) {
            $message->to('pianomasterclass.ks@gmail.com', 'MasterClass')->subject
            ('Passive Request: ' . $request['first_name'] . ' ' . $request['last_name']);
        });

       }
        // $data = [
        //     'fname' => request()['first_name'],
        //     'lname' => request()['last_name'],
        //     'email' => request()['email'],
        //     'int_level' => request()['int_level'], 
        //     'price' => request()['price'], 
        //     'country' => request()['country'], 
        //     'city' => request()['city'], 
        //     'dob_month' => request()['dob_month'], 
        //     'dob_day' => request()['dob_day'], 
        //     'dob_year' => request()['dob_year'], 
        // ];
        //   Mail::send('emails.mail', $data, function($message) {
        //      $message->to('gentiannuka@gmail.com', 'MasterClass')->subject
        //         ('NEW EMAIL');
        //   });
          return response()->json("success");
    }
}
