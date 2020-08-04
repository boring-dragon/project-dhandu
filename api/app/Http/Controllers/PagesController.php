<?php

namespace App\Http\Controllers;

use App\Models\Sensor;

class PagesController extends Controller
{    
    /**
     * index
     *
     * @param  mixed $sensor
     * @return void
     */
    public function index(Sensor $sensor)
    {
        return view('pages.index', [ 
        'temperature' => $sensor->ScopeTypeWhere(1, 'temperature')->last(),
        'humidity' => $sensor->ScopeTypeWhere(1, 'humidity')->last(),
        'moisture' => $sensor->ScopeTypeWhere(2, 'moisture')->last(),
        'methane' =>  $sensor->ScopeTypeWhere(3, 'methane')->last(),
        'carbonmonoxide' => $sensor->ScopeTypeWhere(4, 'co')->last(),
        'dht' => $sensor->ScopeFindSensorReadings(1),
        'soilmoisturesensor' => $sensor->ScopeFindSensorReadings(2),
        'mq4' => $sensor->ScopeFindSensorReadings(3),
        'mq9' => $sensor->ScopeFindSensorReadings(4)]);
    }
    
    /**
     * controls
     *
     * @return void
     */
    public function controls()
    {
        return view('pages.controls');
    }
}
