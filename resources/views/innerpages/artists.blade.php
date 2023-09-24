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
   <div class="lang_apply_1" style="width: 256px;
position: absolute;
top: 58%;
right: 236px;
display: flex;
justify-content: space-around;">
<div>
<a href="/event/{{$lang}}" style="padding: 15px 20px; width:auto !important" class="btn">@if($lang == 'en') Apply Now @else Apliko Tani @endif</a>
</div>

<div>
        @if($lang == 'en')
        <a style="font-weight:bold;" href="/artists/{{$id}}/{{$slugable}}/al">SQ</a>
        @else
        <a style="font-weight:bold;" href="/artists/{{$id}}/{{$slugable}}/en">ENG</a>
        @endif
</div>

    </div>
    <div class="right">
      <p class="button back" style="float:right">
        <a href="/">← Back</a>
      </p>
    </div>

  </div>

</header>

<section class="people">

    <div class="people--inner" style="margin-top: 83px">
  
      <div class="people--intro">
  
        <div class="people--intro__left">
          <span class="type">
            Artist        </span>
          <h1>
          {!!$entity[0]['collections']['name'][$lang]!!}      </h1>
          <span class="job">
          {!!$entity[0]['collections']['position'][$lang]!!}
                  <ul class="socials">
                      @if($entity[0]['collections']['insta_link'][$lang])
                                <li>
              <a class="instagram" href=" {!!$entity[0]['collections']['insta_link'][$lang]!!}">Instagram</a>
            </li>
            @endif
            @if($entity[0]['collections']['facebook_link'][$lang])
                                <li>
              <a class="facebook" href=" {!!$entity[0]['collections']['facebook_link'][$lang]!!}">Facebook</a>
            </li>
            @endif

            <li>
              <a  href=" {!!$entity[0]['collections']['facebook_link'][$lang]!!}">WEB
</a>
            </li>
                              </ul>
        </div>
  
        <div class="people--intro__right">
          <figure>
            <img width="700" height="700" src="/img/manjakos/{!!$entity[0]['collections']['image']!!}" class="o-cover" alt="" loading="lazy" srcset="/img/manjakos/{!!$entity[0]['collections']['image']!!}" sizes="(max-width: 700px) 100vw, 700px" />        </figure>
        </div>
  
      </div>
  
      <div class="people--content artist-info ">
        <div class="rtf">
          <p><span style="font-weight: 400;">
          {!!$entity[0]['collections']['content'][$lang]!!}<p></p>
        </div>
      </div>
  
    </div>
  
  </section>

@endsection
