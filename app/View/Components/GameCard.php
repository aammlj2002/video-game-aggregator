<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameCard extends Component
{
    public $game;
    public $bladeComponent;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($game, $bladeComponent)
    {
        $this->game = $game;
        $this->bladeComponent = $bladeComponent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game-card');
    }
}
