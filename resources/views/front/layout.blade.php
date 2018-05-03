<!doctype html>
<html class="no-js" lang=""> 

    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('css')</title>
        <link rel="stylesheet" href="{{asset('front/viva/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/viva/css/flexslider.css')}}">
        <link rel="stylesheet" href="{{asset('front/viva/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('front/viva/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('front/viva/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('font/fontawesome-free-5.0.10/web-fonts-with-css/css/fontawesome-all.css')}}">
        <link rel="stylesheet" href="{{asset('font/fontawesome-free-5.0.10/svg-with-js/css/fa-svg-with-js.css')}}">
        @yield('css')
    </head>

    <body>

    @include('front.theme.header')
    <!-- Header Section --> 

    @yield('content')

    @include('front.theme.footer')
    <!-- JS FILES --> 
    <script src="{{asset('font/fontawesome-free-5.0.10/svg-with-js/js/fontawesome.min.js')}}"></script>
    <script src="{{asset('js/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('front/viva/js/bootstrap.min.js')}}"></script> 
    <script src="{{asset('front/viva/js/jquery.flexslider-min.js')}}"></script> 
    <script src="{{asset('front/viva/js/retina.min.js')}}"></script> 
    <script src="{{asset('front/viva/js/modernizr.js')}}"></script> 
    <script src="{{asset('front/viva/js/main.js')}}"></script>
    @yield('js')
    </body>
</html>