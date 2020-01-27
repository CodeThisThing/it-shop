
    <!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('css/Main.css')}}}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <link rel="stylesheet" href="">
    <title>Document</title>

</head>

<body style="background:#5c6170; ">
<div class="row wow fadeIn ">

    <nav class="navbar navbar-expand-lg  navbar-dark default-color col-12"  style=" background-color: #4e555b;">
        <a class="navbar-brand ml-5" href="/"><strong>IT-shop</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/phones/1">Apple</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Samsung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="/phones/2">OnePlus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Xiaomi</a>
                </li>
            </ul>
            <i class="fas fa-shopping-cart "  style="color: white;font-size: 23px" ></i>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="nav-link" href="{{ url('/') }}">{{ Auth::user()->name }}</a>
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
@yield('content')
@yield('About')
@yield('succes_message')

</body>
</html>

