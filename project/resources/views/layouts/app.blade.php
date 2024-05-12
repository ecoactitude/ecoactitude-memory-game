<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mémo Actitude</title>
    <link rel="icon" href="{{ asset('images/eco_actitude_icon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    @livewireStyles
</head>
<body>
    <h1>
        <a href="{{ route('home') }}" wire:navigate>
            <img class="logo" src="{{ asset('images/gaia.svg') }}" alt="L'Eco-Mémo">
        </a>
        L'Eco-Mémo
    </h1>

    @if (Request::route()->getName() !== 'home')
        <div class="nav-wrapper">
            <nav class="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" wire:navigate><span class="emoticon">🏠</span>Retour</a>
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
    <p class="rights">Conçu par <a href="https://www.linkedin.com/in/julien-schmitt-backend-developer/" target="_blank">Julien SCHMITT</a></p>
</footer>
</html>