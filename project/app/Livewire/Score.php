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
    #[Session]
    public int $combo = 0;

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
        ++$this->combo;

        // Increment the score by 10 + (combo * 5)
        $this->score += 10 + ($this->combo * 5);

        $this->dispatch('reload-combo-animation');
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
        $this->combo = 0;

        // If the score is less than 10, decrement the score by 1
        // Otherwise, decrement the score by an integer of score / 10
        if ($this->score < 10) {
            --$this->score;
        } else {
            $this->score -= intval($this->score / 10);
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
        $this->combo = 0;
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
     *
     */
    public function saveScore(): Redirector
    {
        // Validate the name
        $this->validate();

        \App\Models\Score::create([
            'name' => $this->name,
            'score' => $this->score,
        ]);

        session()->flush();
        $this->resetScore();

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
