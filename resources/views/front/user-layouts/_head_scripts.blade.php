<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="{{ $setting->description }}" />
    <meta name="keywords" content=" {{ $setting->name }}" />
    <meta name="author" content="Mohamed Ramada :: Phone :: +201011642731" />
    <title>
        @yield('title')
    </title>
    <link rel="apple-touch-icon" href="{{ $setting->getLogo() }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting->getLogo() }}" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet" />
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet" />
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/user-dashboard/') }}/css-rtl/vendors.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/vendors/css/weather-icons/climacons.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/fonts/meteocons/style.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/vendors/css/charts/morris.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/vendors/css/charts/chartist.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/vendors/css/charts/chartist-plugin-tooltip.css" />
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/user-dashboard/') }}/css-rtl/app.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/user-dashboard/') }}/css-rtl/custom-rtl.css" />
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/css-rtl/core/menu/menu-types/vertical-menu.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/css-rtl/core/colors/palette-gradient.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/fonts/simple-line-icons/style.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/css-rtl/core/colors/palette-gradient.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/css-rtl/pages/timeline.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/front/user-dashboard/') }}/css-rtl/pages/dashboard-ecommerce.css" />
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/front/user-dashboard/') }}/css-rtl/style-rtl.css" />
    <!-- END Custom CSS-->
    <!-- Start File Input  -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.4/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
    @toastifyCss
    @yield('css')
    @livewireStyles
</head>

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar chat-application" data-open="click"
    data-menu="vertical-menu" data-col="2-columns">
