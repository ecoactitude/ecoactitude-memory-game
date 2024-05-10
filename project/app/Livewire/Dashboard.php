<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class Dashboard extends Component
{
    /**
     * Start a new game.
     *
     * @return Redirector
     */
    public function newGame(): Redirector
    {
        session()->flush();
        return redirect()->route('play');
    }

    /**
     * Render the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
