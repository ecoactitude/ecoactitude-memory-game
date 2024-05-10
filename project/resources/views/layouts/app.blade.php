<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Fantasy Memory Quest</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P">
    @livewireStyles
</head>
<body>
    <h1>
        <a href="{{ route('home') }}" wire:navigate>
            <img class="logo" src="{{ asset('images/crystal.webp') }}" alt="Final Fantasy Memory Quest">
        </a>
        Final Fantasy Memory Quest
    </h1>

    @if (Request::route()->getName() !== 'home')
        <div class="nav-wrapper">
            <nav class="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" wire:navigate><span class="emoticon">🏠</span>Back</a>
                    </li>
                </ul>
            </nav>
            @yield('breadcrumbs')
        </div>
    @endif
    <div class="content">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.min.js') }}"></script>
    @livewireScripts
</body>
<footer>
    <p class="rights">© 2024-2100 - All Rights Reserved</p>
</footer>
</html>