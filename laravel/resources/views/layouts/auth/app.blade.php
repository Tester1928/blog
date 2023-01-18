<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/laravel/public/vendors/bootstrap/dist/css/bootstrap.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="/laravel/public/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/laravel/public/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/laravel/public/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/laravel/public/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/laravel/public/vendors/selectFX/css/cs-skin-elastic.css">

<link rel="stylesheet" href="/laravel/public/css/admin/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="{{route("main")}}">
                    Blog.by
                </a>
            </div>
        </div>
        @yield('content')
    </div>
</div>


<script src="/laravel/public/vendors/jquery/dist/jquery.min.js"></script>
<script src="/laravel/public/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="/laravel/public/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/laravel/public/js/admin/main.js"></script>


</body>
</html>
