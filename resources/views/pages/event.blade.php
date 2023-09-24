@extends('index')
@section('title_and_meta')

@endsection
@section('content')

<!-- banner start -->

<?php
    //var_dump($many[0]["slider"][0]['collections']);
    // foreach($many as $slide) {
    //     echo $slide;
    // }

 ?>

<div id="wrapper">

<main class="container single">

<header class="header header--default header--color">

  <div class="header-inner">

    <div>
      <a href="/">
      <img style="margin-left: -25px;" class="logo" src="/img/manjakos/<%includes.global.one[0]['header_info']['collections']['logo_header']%>" />
        </a>
    </div>
    <div class="lang_apply_1 lang_apply_2" style="width: 50px;
position: absolute;
top: 58%;
right: 236px;
width: 50px !important;">
        @if($lang == 'en')
        <a href="/{{$slug}}/al" style="font-weight: bold;">SQ</a>
        @else
        <a href="/{{$slug}}/en" style="font-weight: bold;">ENG</a>
        @endif
    </div>

    <div class="right">
      <p class="button back" style="float:right">
        <a href="/">← Back</a>
      </p>
    </div>

  </div>

</header>



<section class="people">

  <div class="people--inner"  style="margin-top: 85px">

    <div class="people--intro">

      <div class="people--intro__left">
        <span class="job">
        {!!$one['event_info']['collections']['title_event'][$lang]!!}     </span>
          <p>{!!$one['event_info']['collections']['under_title_event'][$lang]!!} </p>
      </div>

      <div class="people--intro__right">
        <figure>
          <img width="700" height="831" src="/img/manjakos/{!!$one['event_info']['collections']['image_inner_event']!!}" class="o-cover" alt="" loading="lazy" srcset="/img/manjakos/{!!$one['event_info']['collections']['image_inner_event']!!}" sizes="(max-width: 700px) 100vw, 700px" />        </figure>
      </div>

    </div>

    <div class="people--content">
      <div class="rtf">
        
      <div class="main--content">
    <div style="width:100%;">
    <h2>
      Application
    </h2>
    <ul class="slash--program__days">
    @foreach ($many[0]["event_programs"] as $box) 
          <li class="slash--program__day">
        <h3>
        {!! $box['collections']['program_dates'][$lang] !!}          <span class="is-fr" lang="fr"></span>
        </h3>
                  <ul>

                  
                      <li class="slash--program__conference">
              <span class="hours">→ {!! $box['collections']['program_type'][$lang] !!}</span>
              <h4>
              {!! $box['collections']['program_name'][$lang] !!}                <span class="is-fr" lang="fr"></span>
              </h4>
                              <div class="rtf">
                  <p>
                  {!! $box['collections']['program_content'][$lang] !!}
                  </p>
<p></p>
                </div>
                                        </li>
                    </ul>
              </li>@endforeach
         
         
         
        
        </ul>
    </div>


</div><!-- ./programs -->



        <p><span style="font-weight: 400;">
        {!!$one['event_info']['collections']['content_event'][$lang]!!}
        </span></p>
<p></p>
<p></p>



<div class="main--content">
    <div style="width:100%;">
        <h3>2022 Program Information</h3>
        <table style="width:100%;" class="data" cellspacing="1" cellpadding="1" border="1">
            <tbody>
                <tr>
                    <td>
                    <div><strong>Program dates:</strong></div>
                    </td>
            <td><span>{!!$one['program_information_event']['collections']['program_dates_event'][$lang]!!}</span></td>
        </tr>
       <tr><td><strong>Payment deadline:</strong></td>
            <td>{!!$one['program_information_event']['collections']['payment_deadline_event'][$lang]!!}</td>
        </tr><tr><td><strong><span>Location:</span></strong></td>
            <td>{!!$one['program_information_event']['collections']['move_in_event'][$lang]!!}</td>
        </tr><tr><td>
            <div><strong>Age range:</strong></div>
            </td>
            <td>
            <div>{!!$one['program_information_event']['collections']['age_range_event'][$lang]!!}</div>
            </td>
        </tr></tbody></table>
    </div>


</div>


<!-- <div class="main--content" style="margin-top: 40px;">
  <div class="package" style="width:45%;">
      <h3>Active participants</h3>
      <table style="width:100%;" class="data_1" cellspacing="1" cellpadding="1" border="1">
          <tbody>
              <tr>
                  <td>
                  <div>Attending the opening recital of the festival <b>Masterclass with the Masters</b></div>
                  </td>
      </tr><tr><td>Meet & Greet with the Director of Festival and Guest Artists.</td>
      </tr><tr><td>
        Performing for one masterclass session, open to the public
          </td>
      </tr><tr><td>
        Attending daily lectures 
          </td>
      </tr><tr><td>Attending daily masterclasses hosted by each Guest Artist</td>
      </tr><tr><td>3 individual lessons with each professor</td>
      </tr><tr>
          <td>Performing at the final concert at the Amphitheater of UP</td>
      </tr><tr><td>
        Certificate of participation
          </td>
      </tr>
      <tr><td>
        Consultations with each professor regarding future studies abroad, USA and Turkey.
          </td>
      </tr>

      <tr>
        <td><span><strong>Price: 150Euro</strong></span> <a id="apply_1" style="font-weight: bold; padding: 5px 10px; margin-left: 20px;" class="btn" href="#">Apply Now</a></td>
      </tr>
    </tbody></table>
  </div>

  <div class="package" style="width:45%;">
    <h3>Passive participants</h3>
    <table style="width:100%;" class="data_1" cellspacing="1" cellpadding="1" border="1">
        <tbody>
            <tr>
                <td>
                  Attending the opening recital of the festival Masterclass with the Masters
                </td>
    </tr><tr><td>Meet & Greet with the Festival Director and Guest Artists.</td>
    </tr><tr><td>
      Attending daily lectures
        </td>
    </tr><tr><td>
      Attending daily masterclasses
        </td>
    </tr><tr><td>Attending the final student recital</td>
      </tr>

      <tr><td>Attending the final student recital</td>
      </tr>

      <tr>
        <td><span><strong>Price: 40Euro</strong></span> <a style="font-weight: bold; padding: 5px 10px; margin-left: 20px;" class="btn" id="apply_2" href="#">Apply Now</a></td>
      </tr>
 </tbody></table>
</div> -->


</div>



<div id="apply_form"></div>

<div class="main--content" id="apply_form_inner">
    <div style="width:100%;">
        <div class="main-content" style="margin-top:80px;">

            <div id="success_message_place" style="background:#822144; color:#ffffff; padding: 10px 20px">
            <h3>{!!$one['apply_form_information']['collections']['apply_title_event'][$lang]!!}</h3>
          
                        <p>
                        {!!$one['apply_form_information']['collections']['apply_text_event'][$lang]!!}
                        </p>
        
                </div>
        
            
            <div id="success_message_place_1" style="border:2px solid #822144; padding: 20px 20px">
            <form id="form">
            <div class="form-group">
            
            <div>                
                <label>Emri <span style="color:red;">*</span></label>
                <input id="fname" name="first_name" value="" class="input-control" />
            </div>

            <div>
                <label class="right-inline">Mbiemri <span style="color:red;">*</span></label>
                <input id="lname" name="last_name" value="" class="input-control" />
            </div>
            </div>

            <div class="form-group">
                <div>
                    <label>Zgjedh kategorine <span style="color:red;">*</span></label>
                    <select id="price" name="price" class="input-control" aria-label="Default select example">
                        <option selected hidden value="">Selekto cmimin</option>
                        <option value="active">Active performer</option>
                        <option value="passive">Observer</option>
                    </select>
                </div>
            </div>

            <div class="extra_fields">
            </div>
        
            <!-- form -->

        </form>

            </div>
        
        </div>
    </div>


</div>

      </div>

      
    </div>


  </div>

</section>


</main>
</div>



<svg class="gradient-svg" version="1.1" width="0" height="0">
  <filter id="gradient-green" x="-10%" y="-10%" width="120%" height="120%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
    <feColorMatrix type="matrix" values=".33 .33 .33 0 0
              .33 .33 .33 0 0
              .33 .33 .33 0 0
              0 0 0 1 0" in="SourceGraphic" result="colormatrix"/>
    <feComponentTransfer in="colormatrix" result="componentTransfer">
          <feFuncR type="table" tableValues="0.01 0.95"/>
      <feFuncG type="table" tableValues="0.36 0.73"/>
      <feFuncB type="table" tableValues="0.35 0.73"/>
      <feFuncA type="table" tableValues="0 1"/>
      </feComponentTransfer>
    <feBlend mode="normal" in="componentTransfer" in2="SourceGraphic" result="blend"/>
  </filter>
</svg>

<div class="is_mobile"></div>
<div class="is_tablet"></div>

   

  

@endsection
