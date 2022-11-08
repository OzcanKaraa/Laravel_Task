<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel @yield('title')</title>

    <link href="{{  asset('css/bootstrap.css')  }}" rel="stylesheet">

    @yield('head')

</head>

<body>

@include('layouts.navbar')

@yield('content')

@include('layouts.footer')


<script src="{{ asset('js/script.js') }}"></script>

@yield('js')


</body>
