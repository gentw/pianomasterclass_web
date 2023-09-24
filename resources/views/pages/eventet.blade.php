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
                        <h1 class="page-title"><%includes.global.one[0]['heading_info_events']['collections']['title']['en']%></h1>
                        <ul class="page-list">
                            <li><a href="/">Kreu /</a></li>
                            <li><a href="/eventet"><%includes.global.one[0]['heading_info_events']['collections']['title']['en']%></a></li>
                        </ul>
                        <div class="next-event" ng-if="$index < 1" ng-repeat="event in includes.global.many[1]['upcoming_events']">
                            <a href="<%event['slugable']['en']%>">Eventi i radh&euml;s me <%event['collections']['full_date']%> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-icon">
            <i class="flaticon-fireworks"></i>
        </div>
    </div>
    <!-- breadcrumb-area end -->

        <!-- event box area -->
    <div class="event-box-area margin-top-115 padding-bottom-115">
        <div class="container">
            <div class="row">
                <div class="event-box-wrapper col-lg-12" ng-if="$index < 1" ng-repeat="event in includes.global.many[1]['upcoming_events']">
                    <div class="title-left-style margin-bottom-65">
                        <p class="section-subtitle">Eventi i radh&euml;s </p>
                        <h2 class="section-title">Duke ndodhur n&euml; vazhdim</h2>
                    </div>
                    <div class="img-wrapper">
                        <img src="/img/manjakos/<%event['collections']['image']%>" alt="">
                    </div>
                    <div class="event-box-content">
                        <div class="date-box">
                            <span class="date"><%event['collections']['date']['day']%></span>
                                    <span class="month"><%event['collections']['date']['month']%></span>
                        </div>
                        <h4><a href="/<%event['slugable']['en']%>"><%event['collections']['title']['en']%></a></h4>
                        <ul>
                            <li><a href="#"><i class="fa fa-map-marker"></i> <%event['collections']['location']['en']%></a></li>
                            <li><a href="#"><i class="fa fa-bell"></i> <%event['collections']['time']['en']%></a></li>
                            <!-- <li><a href="#"><i class="fa fa-user"></i> 547 People are going</a></li> -->
                        </ul>
                        <!-- <div class="btn-wrapper">
                            <a class="btn btn-custom-primary" data-toggle="modal" data-target="#eventmodal">Join Now</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- upcoming area -->
    <div class="upcoming-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2 class="section-title">Ngjarjet e kaluara</h2>
                    </div>
                </div>
                <!-- <div class="event-search col-md-12 text-center justify-content-center d-flex">
                    <ul>
                        <li><a class="active" href="#">All</a></li>
                        <li>
                            <select class="eventLocation">
                                <option>Locations</option>
                                <option>Chandpur</option>
                                <option>Comilla</option>
                                <option>Khulna</option>
                            </select>
                        </li>
                        <li>
                            <input type="text" class="form-control" id="datepicker" placeholder="11/26/2019">
                        </li>
                    </ul>
                </div> -->
            </div>
            <div class="row padding-top-50">
                <div class="col-lg-6" ng-repeat="event in includes.global.many[2]['past_events']">
                    <div class="upcoming-box">
                        <div class="ub-image">
                            <img src="/img/manjakos/<%event['collections']['image']%>" alt="">
                        </div>
                        <div class="date-box">
                            <span class="date"><%event['collections']['date']['day']%></span>
                                    <span class="month"><%event['collections']['date']['month']%></span>
                        </div>
                        <div class="ub-content">
                            <h4><a href="<%event['slugable']['en']%>"><%event['collections']['title']['en']%></a></h4>
                            <p><i class="fa fa-map-marker"></i> <%event['collections']['location']['en']%></p>
                        </div>
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