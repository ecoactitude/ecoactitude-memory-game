<div>
    <nav class="dashboard-navigation">
        <ul>
            <li><a href="#" wire:click="newGame">Nouvelle partie</a></li>
            <li><a href="{{ route('play') }}" wire:navigate>Continuer</a></li>
            <li><a href="{{ route('high-scores') }}" wire:navigate>Meilleurs scores</a></li>
        </ul>
    </nav>
</div>