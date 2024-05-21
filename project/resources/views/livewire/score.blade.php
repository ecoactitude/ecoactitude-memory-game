<div>
    <div>
        @if ($combo > 1)
            <img src='{{ asset("images/combos/$combo.png") }}' alt="Combo {{ $combo }}" class="combo">
        @endif
    </div>
    <div>
        <p><span class="bold">Score</span> : {{ $score }}</p>

        @if ($isGameOver)
            <div class="modal">
                <div class="modal-content">
                    <h2>Bravo !</h2>
                    <p>Vous avez marqué <span class="bold">{{ $score }}</span> points.</p>
                    <form wire:submit="saveScore">
                        <label for="name">Saisissez votre <span class="bold">nom</span> pour enregistrer votre score.</label>
                        <input type="text" id="name" name="name" wire:model="name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                        <button type="submit">Enregistrer</button>
                    </form>
                    <button wire:click="redirectDashboard">Quitter sans enregistrer.</button>
                </div>
            </div>
        @endif

    </div>
</div>


