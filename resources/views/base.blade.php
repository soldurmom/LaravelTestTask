<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
<div class="container">
    <a class="navbar-brand" href="/">Tasks</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Каталог</a>
            </li>
        </ul>
    </div>
    <div class="my-2 my-md-0 mr-md-3">
        <ul class="navbar-nav">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="task/create">Создать задание</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('logout')}}">Выйти ({{ Auth::user()->name }})</a>
                </li>
            @endauth
            @guest
                    <li class="nav-item">
                    <a class="nav-link" href="{{url('login')}}">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('register')}}">Регистрация</a>
                </li>
            @endguest
        </ul>
    </div>
</div>
</nav>

    <div class="container" style="margin-top:70px;">
    @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>