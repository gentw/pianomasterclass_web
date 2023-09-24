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
                        <h1 class="page-title"><%includes.global.one[0]['heading_info_blog']['collections']['tiel']['en']%></h1>
                        <ul class="page-list">
                            <li><a href="/">Kreu /</a></li>
                            <li><a href="/blogu"><%includes.global.one[0]['heading_info_blog']['collections']['tiel']['en']%></a></li>
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

    <!-- blog area start -->
    <div class="blog-area margin-top-120">
        <div class="container">
            <div class="row blog-no-sidebar">
                <div class="col-lg-8 offset-lg-4">
                    <div ng-repeat="blog in includes.global.many[0]['blog_posts']" class="blog-item-style-02 margin-top-120">
                        <div class="b-img">
                            <a href="/blog/<%blog['id']%>/<%blog['slugable']['en']%>"><img src="img/manjakos/<%blog['collections']['image']%>" alt=""></a>
                        </div>
                        <div class="b-content">
                            <span class="causes-tag mr-3"><a href="/blog/<%blog['id']%>/<%blog['slugable']['en']%>">Artikull</a></span>
                            <!--<div class="blog-date-box">
                                <h4>28<br><span>Dec</span></h4>
                            </div>-->
                            <h4 class="section-title"><a href="/blog/<%blog['id']%>/<%blog['slugable']['en']%>"><%blog['collections']['title']['en']%></a></h4>
                            <p ><%blog['collections']['content']['en'].substr(0, 200) | removeHTMLTags %>...</p>
                        </div>
                        
                        <div class="blog-meta d-flex flex-column flex-lg-row">
                            <div class="blog-social-share d-flex mr-4">
                            	<span>Publikuar me date: <%blog['created_at']%></span>
                                
                            </div>
                            
                            <div class="btn-wrapper">
                                <a href="/blog/<%blog['id']%>/<%blog['slugable']['en']%>">Lexo artikullin</a> ➝
                            </div>
                        </div>
                    </div>
                
                </div>
                
                <div class="col-md-12">
                    <div class="pagination-area d-flex justify-content-center margin-top-50 padding-bottom-50">
                        <ul>
                            <li>
                                <span class="page-bumber current">01</span>
                            </li>
                            <li>
                                <span class="page-bumber">02</span>
                            </li>
                            <li>
                                <span class="page-bumber">03</span>
                            </li>
                            <li>
                                <span class="next page-bumber"> <i class="fa fa-angle-right"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->

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