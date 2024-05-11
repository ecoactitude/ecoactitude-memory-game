<div>
    <nav class="dashboard-navigation">
        <ul>
            <li><a href="#" wire:click="newGame">Nouvelle partie</a></li>
            <li><a href="{{ route('play') }}" wire:navigate>Continuer</a></li>
            <li><a href="{{ route('high-scores') }}" wire:navigate>Meilleurs scores</a></li>
            <li><a href="https://www.ecoactitude.com">Revenir sur ecoactitude.com <img class="logo-full" src="{{ asset('images/eco_actitude_logo.svg') }}"/> </a></li>
        </ul>
    </nav>
</div>