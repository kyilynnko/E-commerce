<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('Title')</title>
    <link rel="Shortcut icon" href="{{asset('images/dodo.jpg')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    @include('layout.nav')
    @yield('content')
    <script src="<?php echo URL_ROOT."assets/js/tether.min.js" ?>"></script>
    <script src="<?php echo URL_ROOT."assets/js/jquery.js" ?>"></script>
    <script src="<?php echo URL_ROOT."assets/js/bootstrap.min.js" ?>"></script>
</body>
</html>