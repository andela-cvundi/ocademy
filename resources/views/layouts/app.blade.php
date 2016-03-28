<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ocademy</title>
    <!-- Fonts -->
    @include('layouts.styles')
</head>
<body id="app-layout">
    @include('layouts.navbar')
    @yield('content')
    <!-- JavaScript -->
    @include('layouts.js')
</html>
