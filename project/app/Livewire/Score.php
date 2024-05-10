<?php

namespace App\Livewire;

use Livewire\Features\SupportRedirects\Redirector;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Session;
use Livewire\Attributes\Validate;

class Score extends Component
{
    #[Session]
    public int $score = 0;
    #[Validate('required|regex:/^[\pL\s\d]+$/u')]
    public string $name = '';
    #[Session]
    public bool $isGameOver = false;

    /**
     * Increment the score by 10.
     * Launches during the 'increment-score' event.
     *
     * @return void
     */
    #[On('increment-score')]
    public function incrementScore(): void
    {
        $this->score += 10;
    }

    /**
     * Decrement the score by 1.
     * Launches during the 'decrement-score' event.
     *
     * @return void
     */
    #[On('decrement-score')]
    public function decrementScore(): void
    {
        if ($this->score > 0) {
            --$this->score;
        }
    }

    /**
     * Reset the score to 0.
     * Launches during the 'reset-game' event.
     *
     * @return void
     */
    #[On('reset-game')]
    public function resetScore(): void
    {
        $this->score = 0;
        $this->isGameOver = false;
    }

    /**
     * Game over.
     * Launches during the 'game-over' event.
     *
     * @return void
     */
    #[On('game-over')]
    public function gameOver(): void
    {
        $this->isGameOver = true;
    }

    /**
     * Save the score.
     *
     * @return Redirector
     */
    public function saveScore(): Redirector
    {
        // Validate the name
        $this->validate();

        \App\Models\Score::create([
            'name' => $this->name,
            'score' => $this->score,
        ]);

        $this->dispatch('reset-game');

        return redirect()->route('high-scores');
    }

    /**
     * Redirect to the dashboard.
     *
     * @return Redirector
     */
    public function redirectDashboard(): Redirector
    {
        return redirect()->route('home');
    }

    /**
     * Render the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.score');
    }
}
