<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Threshold
 * @package App\Models
 * @version April 13, 2020, 9:40 pm UTC
 *
 * @property integer limit
 * @property string type
 */
class Threshold extends Model
{
    use SoftDeletes;

    public $table = 'thresholds';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'limit',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'limit' => 'integer',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'limit' => 'required',
        'type' => 'required'
    ];

    
}
