<?php

namespace App\View\Components;

use App\Models\Banner;
use Illuminate\View\Component;

class Slider extends Component
{
    public $sliders;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->sliders = Banner::query()
            ->where('type', Banner::SLIDER_BANNER)
            ->where('private', auth()->check())
            ->orderBy('order')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ui.banner-slider');
    }
}
