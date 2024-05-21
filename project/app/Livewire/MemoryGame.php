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

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount(): void
    {
        if (empty($this->cards)) {
            $this->cards = \App\Models\Card::select(['id', 'lot'])->get()->toArray();
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
    #[On('process-flipped-cards')]
    public function processFlippedCards(string $id): void
    {
        // Find the current card
        $key = array_search($id, array_column($this->cards, 'id'));

        // Flip the current card
        $this->cards[$key]['isFlipped'] = true;

        // Store the flipped date
        $this->cards[$key]['flippedDate'] = microtime(true);

        \Log::info("flipCard" . $id);
        \Log::info(print_r($this->cards, true));

        $flippedCards = array_filter($this->cards, function($card) {
            return isset($card['isFlipped']) && $card['isFlipped'] === true && (!isset($card['isInError']) || $card['isInError'] === false);
        });

        // Sort the flipped cards
        uasort($flippedCards, function ($a, $b) {
            if (!isset($a['isCompleted']) && !isset($b['isCompleted'])) {
                return $b['flippedDate'] <=> $a['flippedDate'];
            } else {
                if (isset($a['isCompleted']) && !isset($b['isCompleted'])) {
                    return 1;
                }
                if (isset($b['isCompleted']) && !isset($a['isCompleted'])) {
                    return -1;
                }
            }

            return 0;
        });
        \Log::info(print_r($flippedCards, true));

        // Check if there are two flipped cards
        if (count($flippedCards) > 0 && count($flippedCards) % 2 === 0) {
            // Dispatch the appropriate event based on whether the current card matches the last flipped card
            $lastFlippedCard = array_slice($flippedCards, 1, 1)[0];
            if ($this->cards[$key]['lot'] === $lastFlippedCard['lot']) {
                $this->dispatch('increment-score');
                $this->dispatch('is-in-success')->to(Card::class);
                $this->cards[array_search($lastFlippedCard['id'], array_column($this->cards, 'id'))]['isCompleted'] = true;
                $this->cards[$key]['isCompleted'] = true;

                if (count($flippedCards) === count($this->cards)) {
                    $this->dispatch('game-over')->to(Score::class);
                }
            } else {
                $this->dispatch('increment-attempts')->to(Attempt::class);
                $this->dispatch('decrement-score');
                $this->dispatch('is-in-error', ids: [$id, $lastFlippedCard['id']])->to(Card::class);
                $this->cards[array_search($lastFlippedCard['id'], array_column($this->cards, 'id'))]['isInError'] = true;
                $this->cards[$key]['isInError'] = true;
            }
        }
    }

    /**
     * Reset the error cards.
     * Launches during the 'reset-card' event.
     *
     * @param string $id
     * @return void
     */
    #[On('reset-card')]
    public function resetCard(string $id): void
    {
        \Log::info('delete' . $id);
        \Log::info(print_r($this->cards, true));
        foreach ($this->cards as $key => $card) {
            if ((string)$card['id'] === $id) {
                $this->cards[$key]['isInError'] = false;
                $this->cards[$key]['isFlipped'] = false;
                $this->cards[$key]['flippedDate'] = null;
            }
        }
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
