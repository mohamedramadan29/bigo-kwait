<!DOCTYPE html>
<html lang="ar" dir="rtl">

<style>
    *{
        --accent-color: {{ $setting->main_color }};
    }

</style>

<head>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="{{ $setting->description }}">
    <!-- Title -->
    <title> {{ $setting->name }} </title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ $setting->getFavicon() }}" />
    <link rel="apple-touch-icon" href="{{ $setting->getFavicon() }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ $setting->getFavicon() }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ $setting->getFavicon() }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ $setting->getFavicon() }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">


    <!-- CSS Core -->
    {{--    <link rel="stylesheet" href="{{asset('assets/front/css/core.css')}}" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.rtl.min.css" integrity="sha384-q8+l9TmX3RaSz3HKGBmqP2u5MkgeN7HrfOJBLcTgZsQsbrx8WqqxdA5PuwUV9WIx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- SlickNav Css -->
    <link href="{{ asset('assets/front/') }}/css/slicknav.min.css" rel="stylesheet" />
    <!-- Swiper Css -->
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/swiper-bundle.min.css" />
    <!-- Font Awesome Icon Css-->
    <link href="{{ asset('assets/front/') }}/css/all.css" rel="stylesheet" media="screen" />
    <!-- Animated Css -->
    <link href="{{ asset('assets/front/') }}/css/animate.css" rel="stylesheet" />
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/magnific-popup.css" />
    <!-- Main Custom Css -->
    <link href="{{ asset('assets/front/') }}/css/custom.css" rel="stylesheet" media="screen" />
    <!-- CSS Theme -->

    {{-- <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script> --}}
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var pusher = new Pusher('c512adb58cdb4082ca36', {
            cluster: 'eu'
        });
    </script>
    @toastifyCss
    @yield('css')
</head>

<body>
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="{{ $setting->getLogo() }}" alt="" /></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Magic Cursor Start -->
    <div id="magic-cursor">
        <div id="ball"></div>
    </div>
    <!-- Magic Cursor End -->
