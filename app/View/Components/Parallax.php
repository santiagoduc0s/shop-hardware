<?php

namespace App\View\Components;

use App\Models\Banner;
use Illuminate\View\Component;

class Parallax extends Component
{
    public $background;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->background = Banner::query()
            ->where('type', Banner::BACKGROUND_BANNER)
            ->where('private', auth()->check())
            ->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ui.parallax');
    }
}
