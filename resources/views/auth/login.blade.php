<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BIDEAS CMS</title>

    <link rel="stylesheet" type="text/css" href="{{url('css/admin.min.css')}}">


</head>

<body class="login__body">

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel">
                <div class="panel-body">
                    <a href="https://www.bideaskosova.com/" target="_blank"><img style="width: 130px;" src="{{URL::to('/img/logo.png')}}"></a>
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        <div class="form-group">
                            <input class="form-control" placeholder="Email" name="email" type="email">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control password" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-success btn-block button-login">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Metis Menu Plugin JavaScript -->

<!-- Custom Theme JavaScript -->


</body>

</html>
