<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;

class Card extends Component
{
    public array $card;

    #[Session(key: 'id-{card.id}')]
    public string $id;
    public ?string $src;
    public string $alt;
    #[Session(key: 'isFlipped-{card.id}')]
    public bool $isFlipped = false;
    public bool $isInError = false;

    /**
     * Flip the card.
     * Launches during the 'flip-card' event.
     *
     * @param $id
     * @return void
     */
    #[On('flip-card')]
    public function flipCard($id): void
    {
        if ($this->id !== $id || $this->isFlipped) {
            return;
        }

        $this->isFlipped = true;

        $this
            ->dispatch('process-flipped-cards', id: $this->id)
            ->to(MemoryGame::class)
        ;

        // Then update the card details
        $card = \App\Models\Card::where('id', $this->id)->first();
        $this->src = asset('images/' . $card->src);
        $this->alt = $card->alt;
    }

    /**
     * Start the timer.
     *
     * @return void
     */
    public function startTimer(): void
    {
        $this->dispatch('start-timer');
    }

    /**
     * Mount the component.
     *
     * @param array $card
     * @param string $id
     * @param bool $isInError
     * @return void
     */
    public function mount(array $card, string $id, bool $isInError): void
    {
        if ($this->isFlipped) {
            $card = \App\Models\Card::where('id', $id)->first();
            $this->id = $card->id;
            $this->src = asset('images/' . $card->src);
            $this->alt = $card->alt;
            $this->isInError = $isInError;
        } else {
            $this->id = $id;
            $this->src = null;
            $this->alt = 'Back of card';
            $this->isInError = false;
        }
    }

    /**
     * Place the card in error.
     * Launches during the 'is-in-error' event.
     *
     * @param array $ids
     * @return void
     */
    #[On('is-in-error')]
    public function isInError(array $ids): void
    {
        // Place the card in error if it is in the list of cards in error
        if (in_array($this->id, $ids)) {
            $this->isInError = true;
        }
    }

    /**
     * Reset the card.
     * Launches during the 'reset-card' event.
     *
     * @param string $id
     * @return void
     */
    #[On('reset-card')]
    public function resetCard($id): void
    {
        if ($this->id === $id) {
            $this->isFlipped = false;
            $this->mount(card: $this->card, id: $this->id, isInError: false);
        }
    }

    /**
     * Remove the error state.
     * Launches during the 'is-in-success' event.
     *
     * @return void
     */
    #[On('is-in-success')]
    public function isInSuccess(): void
    {
        // Every card is in success
        $this->isInError = false;
    }

    /**
     * Reset the game.
     * Launches during the 'reset-game' event.
     *
     * @return void
     */
    #[On('reset-game')]
    public function resetGame(): void
    {
        $this->isFlipped = false;
        $this->mount(card: $this->card, id: $this->id, isInError: false);
    }

    /**
     * Render the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.card');
    }
}
