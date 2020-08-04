<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sensor
 * @package App\Models
 * @version April 6, 2020, 10:42 pm UTC
 *
 * @property string name
 * @property string type
 */
class Sensor extends Model
{
    use SoftDeletes;

    public $table = 'sensors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'type',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'type' => 'required'
    ];
    
    /**
     * readings
     *
     * @return void
     */
    public function readings()
    {
        return $this->hasMany(\App\Models\SensorReading::class);
    }
    
    /**
     * ScopeTypeWhere
     *
     * @param  mixed $sensor_id
     * @param  mixed $type
     * @return void
     */
    public function ScopeTypeWhere(int $sensor_id, string $type)
    {
        return $this->find($sensor_id)->readings()->where('type', $type)->get();
    }
    
    /**
     * ScopeFindSensorReadings
     *
     * @param  mixed $sensor_id
     * @return void
     */
    public function ScopeFindSensorReadings(int $sensor_id)
    {
        return $this->find($sensor_id)->readings()->take(7)->orderBy('created_at', 'desc')->get();
    }
    
}
