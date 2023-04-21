<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - My App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>


        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest()
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                @endguest
                @auth()
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
                @endauth
            </ul>
        </div>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
