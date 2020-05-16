<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            @yield('judul')
        </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
        <link rel="icon" type="image/png" href="{{ asset('/login_master/images/icons/favicon.ico') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/login_master/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/login_master/fonts/iconic/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/animate/animate.css') }}">	
        <link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/css-hamburgers/hamburgers.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/animsition/css/animsition.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/select2/select2.min.css') }}">	
        <link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/login_master/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/login_master/css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body>	
        
        @yield('konten')
        
        <script src="{{ asset('/login_master/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('/login_master/vendor/animsition/js/animsition.min.js') }}"></script>
        <script src="{{ asset('/login_master/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('/login_master/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/login_master/vendor/select2/select2.min.js') }}"></script>
        <script src="{{ asset('/login_master/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('/login_master/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('/login_master/vendor/countdowntime/countdowntime.js') }}"></script>
        <script src="{{ asset('/login_master/js/main.js') }}"></script>
    </body>
</html>