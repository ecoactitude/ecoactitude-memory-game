<div>
    <p>Score: {{ $score }}</p>

    @if ($isGameOver)
        <div class="modal">
            <div class="modal-content">
                <h2>Thanks for playing!</h2>
                <p>Your score is <span class="bold">{{ $score }}</span> points.</p>
                <form wire:submit="saveScore">
                    <label for="name">Enter your <span class="bold">name</span> to save your score.</label>
                    <input type="text" id="name" name="name" wire:model="name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                    <button type="submit">Save</button>
                </form>
                <button wire:click="redirectDashboard">Exit without saving</button>
            </div>
        </div>
    @endif
</div>
