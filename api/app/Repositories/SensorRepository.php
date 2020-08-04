<?php

namespace App\Repositories;

use App\Models\Sensor;
use App\Repositories\BaseRepository;

/**
 * Class SensorRepository
 * @package App\Repositories
 * @version April 6, 2020, 10:42 pm UTC
*/

class SensorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type',
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sensor::class;
    }
}
