<!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="http://itshop/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/user_profile.css') }}" type="text/css">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <link rel="stylesheet" href="">
    <title>ITshop</title>

</head>

<body style="background:white; ">
<div class="row wow fadeIn ">

    <nav class="navbar navbar-expand-lg  navbar-dark default-color col-12"  style=" background-color: #000714;">
        <a class="navbar-brand ml-5" href="/"><strong>Вернуться на сайт</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/user_home/user_profile">Профіль</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Мої замовлення</a>
                </li>
            </ul>


            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="nav-link" href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Вхід</a>

                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">Регісрація</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>
</div>
@yield('user_home')
@yield('user_profile')
</body>

</html>
