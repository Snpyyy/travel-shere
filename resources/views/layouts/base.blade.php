<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/937b8a87e9.js" crossorigin="anonymous"></script>
    @livewireStyles
    <title>@yield('title')</title>
</head>
<body>
    <header>@include('includes.header')</header>

    <main>@yield('content')</main>

    <!-- <footer>@include('includes.footer')</footer> -->

    @livewireScripts
    <script type="text/javascript" src="{{ asset('/assets/js/script.js') }}"></script>
</body>
</html>
