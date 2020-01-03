<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/Main.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="">
    <title>Document</title>

</head>
<header>

</header>
<body>
<div class="row wow fadeIn">
    <div class="container col-12 mb-5">
        <nav class="navbar  navbar-expand-lg navbar-dark pink scrolling-navbar">
            <a class="navbar-brand" href="/"><strong>IT-shop</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Opinions</a>
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
</div>
@yield('home_message')
<div class="container">
    <div class="row ">
        <div class="card-columns  d-print-inline position-relative ">
            @yield('content')
        </div>
    </div>
</div>


</body>
</html>




