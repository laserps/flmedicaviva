<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('seo')

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Admin Style -->
        <link rel="stylesheet" href="{{asset('back/css/vendor.css')}}">

        <!-- Theme initialization -->
        <link rel="stylesheet" href="{{asset('back/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('back/css/app-seagreen.css')}}">

        <!-- Styles -->
        <link href="{{ asset('global/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('global/datatables.net-dt/css/jquery.dataTables.css') }}" rel="stylesheet">

        {{--  modal middle  --}}
        <style>
            .modal-dialog {
                min-height: calc(100vh - 60px);
                display: flex;
                flex-direction: column;
                justify-content: center;
                overflow: auto;
            }
        </style>

        <!-- Styles Admin -->
        @yield('csstop')
    </head>
    
    <body>
        
        <div class="main-wrapper">
            <div class="app" id="app">
                @include('layouts.back-header')
                @include('layouts.back-sidebar')
                @yield('content')
                @include('layouts.back-footer')
            </div>
        </div>

        <!-- Scripts -->
        <script>
            var url = "{{ url('/') }}";
            var asset = "{{ asset('') }}";
        </script>
        
        <!-- jquery -->
        <script src="{{asset('global/jquery/dist/jquery.min.js')}}"></script>

        <!-- sweetalert2 -->
        <script src="{{asset('global/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

        <!-- jquery-validation -->
        <script src="{{asset('global/jquery-validation/dist/jquery.validate.min.js')}}"></script>
        <script src="{{asset('global/jquery-validation/dist/localization/messages_th.js')}}"></script>

        <!-- datatables -->
        {{--  <script src="{{asset('global/datatables.net/js/jquery.dataTables.js')}}"></script>  --}}

        <!-- tinymce -->
        {{--  <script src="{{asset('global/tinymce/js/tinymce/jquery.tinymce.min.js')}}"></script>
        <script src="{{asset('global/tinymce/js/tinymce/tinymce.min.js')}}"></script>  --}}

        <script src="{{asset('back/js/vendor.js')}}"></script>
        <script src="{{asset('back/js/app.js')}}"></script>

        @yield('jsbottom')
    </body>

</html>
