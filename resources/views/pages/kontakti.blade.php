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
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area breadcrumb-style-02 main-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner padding-top-238">
                        <h1 class="page-title"><%includes.global.one[0]['heading_info_kontakti']['collections']['title']['en']%></h1>
                        <ul class="page-list">
                            <li><a href="/">Kreu /</a></li>
                            <li><a href="/kontakti"><%includes.global.one[0]['heading_info_kontakti']['collections']['title']['en']%></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-icon">
            <i class="flaticon-fireworks"></i>
        </div>
    </div>
    <!-- breadcrumb-area end -->

       <div class="contact-info-area margin-top-120 margin-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box-style-04 text-center margin-bottom-30">
                        <div class="sb-icon">
                            <a href="#"><i class="flaticon-phone"></i></a>
                        </div>
                        <div class="sb-content">
                            <h4 class="title">{!!$one['contact_boxes']['collections']['call_text']['en']!!}</h4>
                            <span>{!!$one['contact_boxes']['collections']['call_phone_no']['en']!!}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box-style-04 text-center margin-bottom-30">
                        <div class="sb-icon">
                            <a href="#"><i class="flaticon-sent-mail"></i></a>
                        </div>
                        <div class="sb-content">
                            <h4 class="title">{!!$one['contact_boxes']['collections']['email_text']['en']!!}</h4>
                            <span>
                            	{!!$one['contact_boxes']['collections']['email_addresses']['en']!!}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box-style-04 text-center margin-bottom-30">
                        <div class="sb-icon">
                            <a href="#"><i class="flaticon-place"></i></a>
                        </div>
                        <div class="sb-content">
                            <h4 class="title">{!!$one['contact_boxes']['collections']['office_text']['en']!!}</h4>
                            <span>{!!$one['contact_boxes']['collections']['office_location']['en']!!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mapouter">
        <div class="gmap_canvas">
            <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <a href="https://www.embedgooglemap.net/blog/elementor-pro-discount-code-review/">elementor review</a>
        </div>
    </div>

    <div class="politx-content-area padding-top-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <form class="contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Your name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="number" placeholder="Your email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="msg" id="msg" cols="30" rows="5" placeholder="Message"></textarea>
                        </div>
                        <div class="btn-wrapper padding-top-33">
                            <button class="btn btn-custom-primary btn-block">Send your message</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 offset-lg-1 d-flex align-self-center">
                    <div class="content-box-style-01 margin-top-45">
                        <p class="section-subtitle">{!!$one['contact_form_section']['collections']['above_title_text']['en']!!}</p>
                        <h2 class="title">{!!$one['contact_form_section']['collections']['title']['en']!!}</h2>
                        <p class="para">{!!$one['contact_form_section']['collections']['description']['en']!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- party-box-area start -->
    <div class="party-box-area padding-top-120">
        <div class="container">
            <div class="col-lg-12 party-box-wrapper d-flex flex-lg-row flex-column justify-content-lg-between justify-content-center text-lg-left text-center">
                <div class="party-box-content">
                    <h4><%includes.global.one[0]['behu_vullnetar']['collections']['title']['en']%></h4>
                    <p><%includes.global.one[0]['behu_vullnetar']['collections']['description']['en']%></p>
                </div>
                <div class="btn-wrapper align-self-center">
                    <a class="btn btn-custom-primary" href="<%includes.global.one[0]['behu_vullnetar']['collections']['button_link']['en']%>"><%includes.global.one[0]['behu_vullnetar']['collections']['button_text']['en']%></a>
                </div>
            </div>
        </div>
    </div>
    <!-- party-box-area end -->

  

@endsection