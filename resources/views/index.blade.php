<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" ng-app="alrayan1">
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Pianomasterclass" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Masterclass with the Masters is a piano festival created by Deniza Dërdovski, pianist/entrepreneur."/>
    <meta name="robots" content="noodp"/>
    <link rel="canonical" href="https://pianomastersclass.com/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Piano Masterclass by Deniza Dërdovski" />
    <meta property="og:description" content="Masterclass with the Masters is a piano festival created by Deniza Dërdovski, pianist/entrepreneur." />
    <meta property="og:url" content="https://pianomastersclass.com" />
    <meta property="og:site_name" content="Piano MastersClass by Deniza Dërdovski" />
    <meta property="og:image" content="https://pianomastersclass.com/img/manjakos/6411650780462.jpg" />

    <link rel="shortcut icon" href="images/favicon.png" />

    <title>Piano MasterClass by Deniza Dërdovski</title>
    @yield('title_and_meta')
    
    <link rel="stylesheet" href="{{url('/css/styles-v1631614754.css')}}" />
    <link rel="stylesheet" href="{{url('/css/custom.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/1.3.1/css/toastr.css" rel="stylesheet" type="text/css" />

   <style>
       .loader{
        width: 100%;
        height: 100%;
        background: #fff;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999999;
      }
      .lds-dual-ring {
        display: inline-block;
        width: 80px;
        height: 80px;
        position:absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }
      .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 64px;
        height: 64px;
        margin: 8px;
        border-radius: 50%;
        border: 6px solid #000;
        border-color: #000 transparent #000 transparent;
        animation: lds-dual-ring 1.2s linear infinite;
      }
      @keyframes lds-dual-ring {
        0% {
          transform: rotate(0deg);
        }
        100% {
          transform: rotate(360deg);
        }
      }

    </style>

    <!-- JavaScript -->
<!--    <script src="{{url('js/main-v1631614754.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/1.3.1/js/toastr.js"></script>
    <script src="{{url('js/owl.carousel.min.js')}}"></script>
    <script src="{{url('js/custom.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular-sanitize.js"></script>
    <script src="{{url('/js/app.js')}}" defer></script> -->
  </head>

  <?php 
  	$class = "body-startup body-mgl";
  	if(str_contains($_SERVER["REQUEST_URI"], 'event')) {
  		$class = "body-event";
  	}

    if(str_contains($_SERVER["REQUEST_URI"], 'artists')) {
  		$class = "body-artists";
  	}
    // class="{{$class}}"
  ?>

  <body class="{{$class}}" ng-controller="HeaderCtrl">
  	<div class="loader"><div class="lds-dual-ring"></div></div>


  <div>
    @yield('content')
</div>
@include('includes.footer')


    <!-- JavaScript -->
    <script src="{{url('js/main-v1631614754.js')}}"></script>
    <script src="{{url('js/owl.carousel.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/1.3.1/js/toastr.js"></script>

    <script src="{{url('js/custom.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular-sanitize.js"></script>
    <script src="{{url('/js/app.js')}}"></script> 
  </body>
</html>
