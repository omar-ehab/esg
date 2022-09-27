<!doctype html>
<html class="no-js" lang="en">

<head>
    <!--====== META ======-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== FAVICON ICON =======-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/site.webmanifest') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css ">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600&display=swap" rel="stylesheet">

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="{{asset('assets/themes/theme_en/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/themes/theme_en/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/themes/theme_en/css/stellarnav.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/themes/theme_en/css/owl.carousel.css')}}">
    <link href="{{asset('assets/themes/theme_en/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/themes/theme_en/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/themes/theme_en/css/jquery.fancybox.min.css')}}">

    <!--====== MAIN STYLESHEETS ======-->
    <link href="{{asset('assets/themes/theme_en/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/themes/theme_en/css/responsive.css')}}" rel="stylesheet">

    <script src="{{asset('assets/themes/theme_en/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="{{asset('assets/themes/theme_en/js/vendor/select2.min.css')}}"></script>

    <link rel="stylesheet" href="{{asset('assets/themes/theme_en/build/css/intlTelInput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/themes/theme_en/build/css/demo.css')}}">
    @stack('styles')

</head>

<body class="home-one">


@include('layouts._sidebar')

@include('layouts._header')


@yield('content')



@include('layouts.footer')

<!--====== SCRIPTS JS ======-->
@include('layouts._scripts')


</body>

</html>
