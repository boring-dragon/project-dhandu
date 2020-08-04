<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SensorTable extends Component
{
    public $sensor_name;
    public $sensor_data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sensorname, $sensordata)
    {
        $this->sensor_name = $sensorname;
        $this->sensor_data = $sensordata;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sensor-table');
    }
}
