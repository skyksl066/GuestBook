<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')  Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="/">Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: left">
        <ul class="navbar-nav ml-md-auto" >
            @if (Route::has('login'))
            @auth
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/home') }}">會員中心 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}<span class="sr-only">(current)</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>



            @else

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif
            @endauth
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/post') }}">留言板</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Language
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item set_language" data-language="zh-TW" href="#">繁體中文</a>
                    <a class="dropdown-item set_language" data-language="zh-CN" href="#">简体中文</a>
                    <a class="dropdown-item set_language" data-language="en" href="#">English</a>
                </div>
            </li>

        </ul>
    </div>
</nav>

<div class="container">
    <br /><br /><br />
    @yield('content')
</div>

<script src="/assets/js/jquery-3.4.1.slim.min.js" defer></script>
<script src="/assets/js/popper.min.js" defer></script>
<script src="/assets/js/bootstrap.min.js" defer></script>
</body>
</html>
