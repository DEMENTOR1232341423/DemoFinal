<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <div>
            <a href="{{ route('home') }}"><img src="{{ asset('img/slide4.png') }}" alt=""></a>
        </div>
        <div class="aaa"><a href="{{ route('home') }}"><h2>Курсы.РФ</h2></a></div>
        <div class="aaa"><a href="{{ route('register') }}"><h2>Регистрация</h2></a></div>
        <div class="aaa"><a href="{{ route('login') }}"><h2>Вход</h2></a></div>
    </header>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@yield('content')
@include('layouts.fot')
</body>
</html>