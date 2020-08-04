<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Stats extends Component
{

    public $reading;
    public $label;
    public $icon;
    public $textcolor;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($reading, $label, $icon,$textcolor)
    {
        $this->reading = $reading;
        $this->label = $label;
        $this->icon = $icon;
        $this->textcolor = $textcolor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.StatsComponent');
    }
}
