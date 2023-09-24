@extends('index')
@section('title_and_meta')

@endsection
@section('content')

<!-- banner start -->

<!-- wrapper -->
    <div class="body-wrapper">
        <!-- Header -->
        <header class="header is-sticky is-shrink" id="header">
            <!-- Logo  -->
            <div class="header-main header-main-creative">
                <div class="header-sidebar">
                    <div class="header-logo logo mb-auto">
                        <a href="./" class="logo-link">
                            <img class="logo-white" src="images/logo-x.png" srcset="images/logo-x2X.png 2x" alt="logo">
                        </a>
                    </div>
                    <!-- Menu Toogle -->
                    <div class="header-nav-toggle header-nav-creative">
                        <a href="#" class="navbar-toggle navbar-toggle-s2" data-menu-toggle="header-menu">
                            <div class="toggle-line toggle-line-s2">
                                <span></span>
                            </div>
                        </a>
                    </div>
                    <!-- Menu Toogle -->
                    <div class="header-social mt-auto d-none d-sm-block">
                        <ul>
                            <li>
                  <a href="<%includes.global.one[0]['socials']['collections']['fb_link']['en']%>"><em class="ti ti-facebook"></em></a>
                </li>
                <li>
                  <a href="<%includes.global.one[0]['socials']['collections']['twitter_link']['en']%>"><em class="ti ti-twitter-alt"></em></a>
                </li>
                <li>
                  <a href="<%includes.global.one[0]['socials']['collections']['linkedin_link']['en']%>"><em class="ti ti-linkedin"></em></a>
                </li>
                <li>
                  <a href="<%includes.global.one[0]['socials']['collections']['insta_link']['en']%>"><em class="ti ti-instagram"></em></a>
                </li>
                        </ul>
                    </div>
                </div>
                <!-- Menu -->
                <div class="header-navbar header-navbar-creative">
                    <div class="nshape-wrapper">
                        <div class="nshape nshape-lg-alt-s3 l35 b15"></div>
                    </div>
                    <nav class="header-menu" id="header-menu">
              <div class="container-custom">
                <div class="row align-items-center">
                  <div class="col-lg-8">
                    <ul class="menu menu-creative">
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
                        <a class="menu-link nav-link" href="/about"
                          >About Us</a
                        >
                      </li>
                      <li class="menu-item">
                        <a
                          class="menu-link nav-link"
                          href="#services"
                          >Services</a
                        >
                      </li>
                      <li class="menu-item">
                        <a class="menu-link nav-link" href="#portfolio"
                          >Portfolio</a
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
                  </div>
                  <div class="col-md-4 d-none d-lg-block">
                    <div class="header-contact">
                      <%includes.global.one[0]['navbar']['collections']['details']['en']|removeHTMLTags%>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
                </div><!-- .header-navbar --> 
            </div>
        </header>
        <!-- end header -->

        <!-- section/contact -->
        <div class="section section-x bg-light-s2">
            <div class="nk-block nk-block-service">
                <div class="container-custom">
                    <ul class="breadcumb-menu">
                        <li><a href="/">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="section-head section-head-s5 section-sm">
                                <h2>{!!$one['contact_info']['collections']['title']['en']!!}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row gutter-vr-30px">
                        <!-- .col -->
                        <div class="col-lg-8">
                            <form class="genox-form mt-10" action="form/contact.php" method="POST">
                                <div class="form-results"></div>
                                <div class="row">
                                    <div class="form-field form-field-s2 col-md-6">
                                        <input name="cf_name" type="text" placeholder="Your Name" class="input bdr-b required">
                                    </div>
                                    <div class="form-field form-field-s2 col-md-6">
                                        <input name="cf_email" type="email" placeholder="Your Email" class="input bdr-b required">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-field form-field-s2 col-md-6">
                                        <input name="cf_company" type="text" placeholder="Your Compnay" class="input bdr-b required">
                                    </div>
                                    <div class="form-field form-field-s2 form-select col-md-6">
                                        <select name="cf_budget" class="form-control input-select bdr-b input required" id="selectid_b">
                                            <option>What your Budget</option>
                                            <option>$100 - $200</option>
                                            <option>$200 - $300</option>
                                            <option>$300 - $400</option>
                                            <option>$400 - $500</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-field form-field-s2 col-md-12">
                                        <textarea name="cf_msg" placeholder="Briefly tell us about your project. " class="input input-msg bdr-b required"></textarea>
                                        <input type="text" class="d-none" name="form-anti-honeypot" value="">
                                        <button type="submit" class="btn-creative">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- .col -->
                    </div>
                </div>
            </div>
            <div class="nshape-wrapper">
                <div class="nshape nshape-lg nshape-lg-alt-s2 l45 b20"></div>
            </div>
            <div class="bg-image bg-offset-8 bg-light bg-image-loaded bg-image-quarter d-none d-lg-block">
                <div class="shapes">
                    <div class="shape shape-circle b5 r25"></div>
                    <div class="shape shape-triangle l10 t10 ">
                        <div class="shape-down">
                            <svg class="fill">
                                <polygon points="70,3 3,137 137,137" class="triangle"></polygon>
                            </svg>
                            <div class="shape-up">
                                <svg class="stroke">
                                    <polygon points="63,3 3,130 130,130" class="triangle"></polygon>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="shape shape-square r25 t25"></div>
                    <div class="shape shape-rectangle l10 t45"></div>
                </div>
            </div>
        </div>
        <!-- .section/contact -->



        <!-- section / cta-->
        <div class="section section-x tc-light bg-dark-s3">
            <div class="container-custom">
                <div class="row gutter-vr-30px justify-content-between">
                    <div class="col-lg-6">
                        <div class="cta-text cta-text-s4">
                            <h2 class="">Have an idea?</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cta-btn">
                            <p class="lead"><%includes.global.one[0]['have_idea']['collections']['title']['en'] %> <%includes.global.one[0]['have_idea']['collections']['text']['en'] %></p> 
                            <a href="#" class="btn-creative">LEt’s talk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .section-cta -->

        <!-- hr -->
        <hr class="border-full">
        <!-- .hr -->

    </div>
    <!-- wrapper -->
  

  

@endsection