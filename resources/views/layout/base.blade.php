<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="Repears">

    @yield('head')

    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/icofont/icofont.min.css') }}">
    <!-- css upload img -->
    <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">

</head>

@yield('body')
<!-- script pour upload img -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

</html>
