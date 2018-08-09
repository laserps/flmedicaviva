<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('css')</title>
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/flexslider.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/animate.min.css')}}">
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
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.flexslider-min.js')}}"></script>
    <script src="{{asset('front/js/retina.min.js')}}"></script>
    <script src="{{asset('front/js/modernizr.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>
    <script type="text/javascript">
        var url_gb = '{{url("")}}';
        var asset_gb = '{{asset("")}}';
    </script>
    @yield('js')
    </body>
</html>
