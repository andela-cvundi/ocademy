<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ocademy</title>
    <!-- Fonts -->
    @include('layouts.styles')
</head>
<body id="app-layout">
    @include('layouts.navbar')
    <div class="container">
        @yield('content')
    </div>
    <!-- JavaScript -->
    @include('layouts.js')
</html>
