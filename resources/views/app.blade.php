<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>

        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">SugarGang</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/graph">Graph</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/avatarr">Avatarr</a>
                </li>
                </ul>
            </div>
        </nav>
        </header>
        <div class="container" id = "app">
            @yield('content')
        </div>

        <footer>
            <p>&copy; 2023 Products</p>
        </footer>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>