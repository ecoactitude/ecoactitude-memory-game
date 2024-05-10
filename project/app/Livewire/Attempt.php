<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;

class Attempt extends Component
{
    #[Session]
    public int $attempts = 0;

    /**
     * Increment the attempts by 1.
     * Launches during the 'increment-attempts' event.
     *
     * @return void
     */
    #[On('increment-attempts')]
    public function updateAttempts(): void
    {
        $this->attempts++;
    }

    /**
     * Reset the attempts to 0.
     * Launches during the 'reset-game' event.
     *
     * @return void
     */
    #[On('reset-game')]
    public function resetAttempts(): void
    {
        $this->attempts = 0;
    }

    /**
     * Render the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.attempt');
    }
}
