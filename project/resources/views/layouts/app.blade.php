<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._analytics_header', ['gtm_ui' => config('app.gtm-ui')])
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="L'Eco-Mémo est un sous-domaine de Eco-Actitude, un site qui a pour but de sensibiliser les gens à l'écologie et à l'environnement, vous proposant un mini-jeu de Memory sur le thème de l'écologie." />
    <meta name="keywords" content="écologie, mémoire, memory, jeu, environnement, sensibilisation, éducatif, éducation, Eco-Actitude" />
    <meta name="author" content="Eco-Actitude" />
    <meta property="og:title" content="L'Eco-Mémo" />
    <meta property="og:description" content="L'Eco-Mémo est un sous-domaine de Eco-Actitude, un site qui a pour but de sensibiliser les gens à l'écologie et à l'environnement, vous proposant un mini-jeu de Memory sur le thème de l'écologie." />
    <meta property="og:image" content="{{ asset('images/eco_actitude_icon.svg') }}" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="fr_FR" />
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "WebSite",
            "url": "{{ route('home') }}",
            "name": "L'Eco-Mémo",
            "description": "L'Eco-Mémo est un sous-domaine de Eco-Actitude, un site qui a pour but de sensibiliser les gens à l'écologie et à l'environnement, vous proposant un mini-jeu de Memory sur le thème de l'écologie.",
            "isPartOf": {
                "@id": "https://www.ecoactitude.com/"
            },
            "author": {
                "@type": "Person",
                "name": "Eco-Actitude"
            },
            "publisher": {
                "@type": "Organization",
                "name": "Eco-Actitude",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('images/eco_actitude_icon.svg') }}"
                }
            }
            "game": {
                "@type": "VideoGame",
                "name": "Eco-Mémo",
                "description": "Un mini-jeu de Memory sur le thème de l'écologie.",
                "gamePlatform": "Web",
                "applicationCategory": "Educational game",
                "image": "{{ asset('images/game.png') }}",
                "screenshot": "{{ asset('images/combo2.gif') }}",
                "gameLocation": {
                    "@type": "URL",
                    "url": "{{ route('play') }}"
                }
            }
        }
    </script>

    <title>L'Eco-Mémo</title>
    <link rel="icon" href="{{ asset('images/eco_actitude_icon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <link rel="canonical" href="{{ route('home') }}" />
    @livewireStyles
</head>
<body>
    @include('partials._analytics_body', ['gtm_ui' => config('app.gtm-ui')])
    <h1>
        <a href="{{ route('home') }}" wire:navigate>
            <img class="logo" src="{{ asset('images/gaia.svg') }}" alt="Logo de L'Eco-Mémo">
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

    @livewireScripts
    <script src="{{ asset('js/app.min.js') }}"></script>
</body>
<footer>
    <p class="rights">Conçu par <a href="https://www.linkedin.com/in/julien-schmitt-backend-developer/" target="_blank">Julien SCHMITT</a></p>
</footer>
</html>