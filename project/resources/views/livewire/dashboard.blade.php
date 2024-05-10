<div>
    <nav class="dashboard-navigation">
        <ul>
            <li><a href="#" wire:click="newGame"><span class="emoticon">👶</span>New Game</a></li>
            <li><a href="{{ route('play') }}" wire:navigate><span class="emoticon">🥷</span>Continue</a></li>
            <li><a href="{{ route('high-scores') }}" wire:navigate><span class="emoticon">💯</span>High Scores</a></li>
            <li><a href="{{ route('credits') }}" wire:navigate><span class="emoticon">🧾</span>Credits</a></li>
        </ul>
    </nav>
</div>