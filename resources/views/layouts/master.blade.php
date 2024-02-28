<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    <title>Rumah Drone</title>

    <meta charset="utf-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Vendor Stylesheets(used for this page only)-->
    @stack('styles')
    <!--end::Vendor Stylesheets-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link rel="stylesheet" href="{{ Vite::asset('resources/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ Vite::asset('resources/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        div#content {
            min-height: calc(100vh - 180px);
        }
    </style>
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->

<!--begin::Body-->
<body>
<!--begin::Wrapper-->
<div class="main-wrapper">
    <!--begin::Sidebar-->
    @include('layouts.partials.sidebar')
    <!--end::Sidebar-->
    <!--begin::Page-->
    <div class="page-wrapper">
        <!--begin::Navbar-->
        @include('layouts.partials.navbar')
        <!--end::Navbar-->
        <!--begin::Content-->
        <div id="content">
            @yield('content')
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        @include('layouts.partials.footer')
        <!--end::Footer-->
    </div>
    <!--end::Page-->
</div>
<!--end::Wrapper-->

<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ Vite::asset('resources/vendors/core/core.js') }}"></script>
<script src="{{ Vite::asset('resources/vendors/feather-icons/feather.min.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Custom Javascript(used for this page only)-->
@stack('scripts')
<!--end::Custom Javascript-->
</body>
</html>
