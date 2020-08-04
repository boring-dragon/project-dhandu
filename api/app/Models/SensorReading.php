<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SensorReading
 * @package App\Models
 * @version April 6, 2020, 10:45 pm UTC
 *
 * @property integer sensor_id
 * @property string reading
 * @property string type
 */
class SensorReading extends Model
{
    use SoftDeletes;

    public $table = 'sensor_readings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'sensor_id',
        'reading',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sensor_id' => 'integer',
        'reading' => 'float',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'sensor_id' => 'required',
        'reading' => 'required',
        'type' => 'required'
    ];

    public function sensor()
    {
        return $this->belongsTo(\App\Models\Sensor::class);
    }

    
}
