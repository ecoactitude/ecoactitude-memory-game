<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;

class MemoryGame extends Component
{
    #[Session]
    public array $cards = [];
    #[Session]
    public array $lastFlippedCard = [];

    protected $listeners = ['refresh-component' => '$refresh'];

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount(): void
    {
        if (empty($this->cards)) {
            $this->cards = \App\Models\Card::select(['id'])->get()->toArray();
            shuffle($this->cards); // shuffle the cards
        }
    }

    /**
     * Flip a card.
     * Launches during the 'flip-card' event.
     *
     * @param string $id
     * @param bool $isFlipped
     * @return void
     */
    #[On('flip-card')]
    public function flipCard(string $id, bool $isFlipped): void
    {
        // Find the current card
        $key = array_search($id, array_column($this->cards, 'id'));

        // Flip the current card
        $this->cards[$key]['isFlipped'] = $isFlipped;

        // Check if the current card is flipped
        if ($this->cards[$key]['isFlipped'] === true) {
            $flippedCards = array_filter($this->cards, function($card) {
                if (isset($card['isFlipped'])) {
                    return $card['isFlipped'] === true;
                }
                return false;
            });

            // Check if there are two flipped cards
            if (count($flippedCards) > 0 && count($flippedCards) % 2 === 0) {
                // Dispatch the appropriate event based on whether the current card matches the last flipped card
                if (\App\Models\Card::select('lot')->where('id', $id)->pluck('lot')->first() === $this->lastFlippedCard['lot']) {
                    $this->dispatch('increment-score');
                    $this->dispatch('is-in-success')->to(Card::class);
                    $this->cards[array_search($this->lastFlippedCard['id'], array_column($this->cards, 'id'))]['isInError'] = false;
                    $this->cards[$key]['isInError'] = false;

                    if (count($flippedCards) === count($this->cards)) {
                        $this->dispatch('game-over')->to(Score::class);
                    }
                } else {
                    $this->dispatch('increment-attempts')->to(Attempt::class);
                    $this->dispatch('decrement-score')->to(Score::class);
                    $this->dispatch('is-in-error', ids: [$id, $this->lastFlippedCard['id']])->to(Card::class);
                    $this->cards[array_search($this->lastFlippedCard['id'], array_column($this->cards, 'id'))]['isInError'] = true;
                    $this->cards[$key]['isInError'] = true;
                }
            } elseif (count($flippedCards) > 0) {
                // Store the current card as the last flipped card
                $this->lastFlippedCard = \App\Models\Card::select('id', 'lot')->where('id', $id)->first()->toArray();
            }
        }

        $this->dispatch('refresh-component');
    }

    /**
     * Reset the error cards.
     * Launches during the 'reset-error-cards' event.
     *
     * @param string $id
     * @return void
     */
    #[On('reset-error-cards')]
    public function resetErrorCards($id): void
    {
        $this->lastFlippedCard = [];
        foreach ($this->cards as $key => $card) {
            if ((string)$card['id'] === $id) {
                $this->cards[$key]['isInError'] = false;
                $this->cards[$key]['isFlipped'] = false;
            }
        }

        $this->dispatch('refresh-component');
    }

    /**
     * Reset the game.
     * Launches during the 'reset-game' event.
     *
     * @return void
     */
    public function resetGame(): void
    {
        $this->cards = [];
        $this->flippedCardsCount = 0;
        $this->lastFlippedCard = [];
        $this->dispatch('reset-game');
        $this->mount();
    }

    /**
     * Render the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.memory-game');
    }
}
