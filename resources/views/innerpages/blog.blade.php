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

    <!-- blog-area start -->
    <div class="blog-area margin-top-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-style-01 margin-bottom-100">
                        <div class="b-img">
                            <a href="#"><img src="/img/manjakos/{!!$entity[0]['collections']['image']!!}" alt=""></a>
                            <div class="blog-date-box">
                                <h4><span>{!!$entity[0]['created_at']!!}</span></h4>
                            </div>
                            <div class="small-thumb">
                                <img src="{{url('/img/new-logo.png')}}" alt="small thumb">
                            </div>
                        </div>
                        <div class="b-content">
                            <div class="blog-meta">
                               <!-- <span class="causes-tag mr-3"><a href="#">Politics</a></span>-->
                            </div>
                            <h4 class="section-title"><a href="{{$entity[0]['slugable']['en']}}">{{$entity[0]['collections']['title']['en']}}</a></h4>
                            <p>{!!$entity[0]['collections']['content']['en']!!}</p>
                           
                        
                        </div>
                    </div>
                    <div id="comments" class="comments-area comments-area-wrapper">
                        <h4 class="comments-title">5 Comments</h4>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img alt="" src="assets/img/blog/c1.png" class="avatar">
                                        </div>
                                        <div class="desc">
                                            <div class="d-flex justify-content-between comment_title">
                                                <div class="d-flex align-items-center">
                                                    <h5>Monalisa Khatun <br><span>5 June 2019</span></h5>                       
                                                </div>
                                                <div class="c-action">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-reply"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                <p>Sometimes ‘short and sweet’ workouts are all you need. If you've done a HIIT workout before you would agree. Prepared do an dissuade be so whatever steepest.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="children">
                                    <li class="comment">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img alt="" src="assets/img/blog/c2.png" class="avatar"> 
                                                </div>
                                                <div class="desc">
                                                    <div class="d-flex justify-content-between comment_title">
                                                        <div class="d-flex align-items-center">
                                                            <h5>Naeem <br><span>23 Dec 2019</span></h5>
                                                        </div>
                                                        <div class="c-action">
                                                            <ul>
                                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-reply"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>Sometimes ‘short and sweet’ workouts are all you need. If you've done a HIIT workout before you would agree. Prepared do an dissuade be so whatever steepest.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img alt="" src="assets/img/blog/c3.png" class="avatar">                
                                        </div>
                                        <div class="desc">
                                            <div class="d-flex justify-content-between comment_title">
                                                <div class="d-flex align-items-center">
                                                    <h5>Asade <br><span>9 May 2019</span></h5>
                                                </div>
                                                <div class="c-action">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-reply"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                <p>Sometimes ‘short and sweet’ workouts are all you need. If you've done a HIIT workout before you would agree. Prepared do an dissuade be so whatever steepest.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div id="respond" class="comment-respond">
                            <h3 class="comment-reply-title">Write a comment</h3>            
                            <form id="comment_form" class="commentform">
                                <div class="row">
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <input type="text" id="author" name="author" value="" class="form-control" placeholder="Your name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" value="" placeholder="Your email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group margin-bottom-30">
                                    <textarea name="comment" id="comment" class="form-control w-100" cols="30" rows="9" placeholder="Type Your Comment*"></textarea>
                                </div>
                                <div class="form-submit">
                                    <button type="submit" class="btn btn-custom-primary">Post comment</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-right-content widget-area sidebar">
                        <div class="widget widget_search">
                            <form class="search-form">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="Shkruaj dicka...">
                                </div>
                                <button class="submit-btn" type="submit">Kërko</button>
                            </form>
                        </div>
                        <div class="widget latest-post-widget">
                            <div class="widget-title">
                                <h4>Të fundit</h4>
                            </div>
                            <div ng-repeat="blog in includes.global.many[3]['latest_news']" class="latest-item">
                                <div class="content-part">
                                    <p><a href="/blog/<%blog['id']%>/<%blog['slugable']['en']%>"><%blog['collections']['title']['en']%></a></p>
                                    <span class="text"><%blog['created_at']%></span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="widget">
                            <div class="blog-sidebar-thumb">
                                <div class="thumb">
                                    <img src="/img/sidebar-img.png" alt="">
                                </div>
                                <div class="thumb-content">
                                    <h4>Bëhu vullnetar</h4>
                                    <div class="btn-wrapper align-self-center">
                                        <a class="btn btn-custom-white" href="/behu-vullnetar">Bashkohu tani</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area end -->


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