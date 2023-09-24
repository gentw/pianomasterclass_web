@extends('index')
@section('title_and_meta')


<div class="contact_header">
@endsection
@section('content')
</div>
<div class="member_header">
</div>



<section class="member_section_all">
    <div class="container">
        <div class="row">
            <div class="col-md-4">  
                <div class="member_image" style="background-image: url({{ URL::to('/img/manjakos/' . $entity[0]['collections']['image'])}})"></div>
                <div class="member_text">
                    <h6>{{ $entity[0]['collections']['name']['en'] }}</h6>
                    <p>{{ $entity[0]['collections']['job-position']['en'] }}</</p>  
                </div>                
            </div>
            <div class="col-md-7 offset-md-1">           
                <div class="desc">
                    {!! $entity[0]['collections']['member_details']['en'] !!}
                </div>      
            </div>
        </div>
    </div>
</section>


@endsection