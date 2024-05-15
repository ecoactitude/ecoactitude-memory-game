<div>
    <button class="action" wire:click="resetGame"><span class="emoticon">🗑️</span>Recommencer</button>
    <div class="memory-infos">
        @livewire(Attempt::class)
        @livewire(Score::class)
    </div>
    <div class="memory-board">
        @foreach($cards as $card)
            @livewire(Card::class, ['card' => $card, 'id' => $card['id'], 'isInError' => $card['isInError'] ?? false], key($card['id']))
        @endforeach
    </div>
</div>