@extends('index')
@section('title_and_meta')

@endsection
@section('content')
<!-- Header -->
  <header class="is-transparent is-sticky is-shrink" id="header">
    
    <div class="header-main">
      <div class="header-container container">
        <div class="header-wrap">
          <!-- Logo  -->
          <div class="header-logo logo">
            <a href="./" class="logo-link">
              <img class="logo-dark" src="images/logo.png" srcset="images/logo2x.png 2x" alt="logo">
              <img class="logo-light" src="images/logo-x.png" srcset="images/logo-x2x.png 2x" alt="logo">
            </a>
          </div>
          <!-- Menu Toogle -->
          <div class="header-nav-toggle">
            <a href="#" class="search search-mobile search-trigger"><i class="icon ti-search"></i></a>
            <a href="#" class="navbar-toggle" data-menu-toggle="header-menu">
              <div class="toggle-line">
                <span></span>
              </div>
            </a>
          </div>
          
          <!-- Menu -->
          <div class="header-navbar">
            <nav class="header-menu" id="header-menu">
              <ul class="menu">
                 <li class="menu-item">
                        <a
                          class="
                            menu-link nav-link
                            
                           
                          "
                          href="/"
                          >Home</a
                        >
                        
                      </li>
                      <li class="menu-item">
                        <a class="menu-link nav-link active" href="/about"
                          >About Us</a
                        >
                      </li>
                      <li class="menu-item">
                        <a
                          class="menu-link nav-link"
                          href="/#services"
                          >Services</a
                        >
                      </li>
                      <li class="menu-item">
                        <a class="menu-link nav-link" href="/#work"
                          >Portfolio</a
                        >
                      </li>

                      <li class="menu-item">
                        <a class="menu-link nav-link" href="/#staff"
                          >Staff</a
                        >
                      </li>
                      
                      <li class="menu-item">
                        <a
                          class="menu-link nav-link"
                          href="/contact"
                          >Contact Us</a
                        >
                      </li>
                
              </ul>
              <ul class="menu-btns">
                <li><a href="" class="btn search search-trigger"><i class="icon ti-search "></i></a></li>
                <li><a href="/contact" class="btn btn-sm">Start A project</a></li>
              </ul>
            </nav>
          </div><!-- .header-navbar -->  

          <!-- header-search -->
          <div class="header-search">
            <form role="search" method="POST" class="search-form" action="#">
              <div class="search-group">
                <input type="text" class="input-search" placeholder="Search ...">
                <button class="search-submit" type="submit"><i class="icon ti-search"></i></button>
              </div>
            </form>
          </div>
          <!-- . header-search -->                                        
        </div>
      </div>
    </div>
    <!-- banner -->
    <div class="banner banner-inner banner-s2 banner-s2-inner tc-light">
      <div class="banner-block">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-sm-9">
              <div class="banner-content">
                <div class="line-animate">
                  <span class="line line-top"></span>
                  <span class="line line-right"></span>
                  <span class="line line-bottom"></span>
                  <span class="line line-left"></span>
                </div>
                <p class="sub-heading">{!!$one['intro_about']['collections']['above_title']['en']!!}</p>
                <h1 class="banner-heading">{!!$one['intro_about']['collections']['title']['en']!!}</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-image">
     
         
          @if($one['intro_about']['collections']['bg_image'] != "image")
          <img src="/img/manjakos/{{$one['intro_about']['collections']['bg_image']}}" alt="banner">
          @else
          <img src="images/bg-a.jpg" alt="banner">
          @endif
        </div>
      </div>
    </div>
    <!-- .banner -->  
  </header>
  <!-- end header -->


  <!-- section -->
  <div class="section section-x tc-grey-alt">
    <div class="container">
      <div class="row justify-content-between gutter-vr-30px">
        <div class="col-lg-6">
          <div class="image-block">
            <img src="img/manjakos/{!!$one['who-we-are-about']['collections']['image_whoweare']!!}" alt="">
          </div>
        </div><!-- .col -->
        <div class="col-lg-6">

          <div class="text-block block-pad-b-100">
            <h5 class="heading-xs dash"> {!!$one['who-we-are-about']['collections']['text_above_title']['en']!!}</h5>
            <h2>{!!$one['who-we-are-about']['collections']['title']['en']!!}</h2>
            <p class="lead">{!!$one['who-we-are-about']['collections']['text_2']['en']!!}</p>
            <p>{!!$one['who-we-are-about']['collections']['text3_whoweare']['en']!!}</p>
          </div><!-- .text-block  -->
        </div><!-- .col -->
      </div><!-- .row -->
    </div><!-- .container -->
  </div>
  <!-- .section -->


  <!-- section -->
  <div class="section section-x bg-secondary is-bg-half tc-grey" id="our_values">

    <!-- bg -->
    <div class="bg-image bg-half style-right">
  
     
      @if($one['our_values_heading']['collections']['bg_image'] != "bg_image")
      <img src="/img/manjakos/{{$one['our_values_heading']['collections']['bg_image']}}" alt="">
      @else
      <img src="images/post-thumb-md-c.jpg" alt="">
      @endif
    </div>
    <!-- end bg -->
    
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="row gutter-vr-30px">
            <div class="col-md-10">
              <div class="section-head section-head-col m-0">
                <h5 class="heading-xs dash">{!!$one['our_values_heading']['collections']['above_title']['en']!!}</h5>
                <h2>{!!$one['our_values_heading']['collections']['title']['en']!!}</h2>
              </div>
            </div>
            @foreach ($many[0]["our_values_list"] as $box) 
            <div class="col-lg-6">
              <div class="text-box res-pr-1rem">
                <h4 class="fw-6">{!!$box['collections']['title']['en']!!}</h4>
                <p>{!!$box['collections']['description']['en']!!}</p>
              </div>
            </div>
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .section -->



  <!-- section -->
  <div class="section section-x tc-light section-feature-alt has-bg-image">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
          <div class="section-head section-md">
            <h5 class="heading-xs dash dash-both">
                  <%includes.global.one[0]['what_we_do_heading']['collections']['title']['en'] %></h5>
            <h2>
                   <%includes.global.one[0]['what_we_do_heading']['collections']['description']['en']|removeHTMLTags%>
                </h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-sm-6 bdr-rt bdr_dark_v1 text-center" ng-repeat="box in includes.global.many[0]['what_we_do_boxes']">
          <div class="feature feature-alt">
            <div class="feature-icon">
              <em class="<%box['collections']['icon_class']['en']%>"></em>
            </div>
            <div class="feature-content">
              <h3><%box['collections']['title']['en']%></h3>
              <p><%box['collections']['description']['en'] | removeHTMLTags%></p>
              <!-- <a href="texas-services.html" class="btn btn-arrow btn-arrow-light">Read More</a> -->
            </div>
          </div>
        </div><!-- .col -->
      </div><!-- .row -->
    </div>
    <!-- bg -->
    <div class="bg-image overlay-dark bg-fixed">
      <img src="images/bg-c.jpg" alt="">
    </div>
    <!-- .bg -->
  </div>
  <!-- .section -->


<!-- team -->
      <div class="section section-x team tc-grey">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-head section-md">
                <h5 class="heading-xs dash dash-both">
                  <%includes.global.one[0]['team_heading']['collections']['above_title']['en'] %></h5>
                <h2><%includes.global.one[0]['team_heading']['collections']['title']['en'] %></h2>
              </div>
            </div>
          </div>
          <!-- .row -->
          <div class="row justify-content-center gutter-vr-30px">
           
            <div class="col-lg-3 col-sm-5" ng-repeat="box in includes.global.many[1]['team_list']">
              <div class="team-single text-center">
                <div class="team-image">
                  <img src="/img/manjakos/<%box['collections']['image']%>" alt="" />
                </div>
                <div class="team-content">
                  <h5 class="team-name"><%box['collections']['full_name']['en']%></h5>
                  <p><%box['collections']['position']['en']%></p>
                </div>
              </div>
            </div>
            
           
          </div>
          <!-- .row -->
        </div>
        <!-- .container -->
      </div>
      <!-- .team -->


<!-- logo -->
  <div class="section section-logo bg-secondary">
    <div class="container">
      <div class="has-carousel" data-items="5" data-navs="false" data-loop="true" data-auto="true">
        @foreach ($many[2]["client_list"] as $box) 
        <div class="col-12">
          <div class="logo-item">
            <img src="/img/manjakos/{!!$box['collections']['client_image']!!}" alt="{!!$box['collections']['client_name']['en']!!}">
          </div>
        </div><!-- .col -->
        @endforeach
       
      </div><!-- .row -->
    </div><!-- .container -->
  </div>
  <!-- .logo -->

  <!-- section / cta-->
  <div class="section section-cta tc-light">
    <div class="container">
      <div class="row gutter-vr-30px align-items-center justify-content-between">
        <div class="col-lg-8 text-center text-lg-left">
          <div class="cta-text-s2">
            <h2><span><%includes.global.one[0]['have_idea']['collections']['title']['en'] %> </span> <strong><%includes.global.one[0]['have_idea']['collections']['text']['en'] %></strong></h2>
          </div>
        </div>
        <div class="col-lg-4 text-lg-right text-center">
          <div class="cta-btn">
            <a href="/contact" class="btn btn-lg">work with us</a>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-image bg-fixed">
      <img src="images/bg-l.jpg" alt="">
    </div>
  </div>
  <!-- .section-cta -->















@endsection