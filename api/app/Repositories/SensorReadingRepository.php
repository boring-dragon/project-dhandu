<?php

namespace App\Repositories;

use App\Models\SensorReading;
use App\Repositories\BaseRepository;

/**
 * Class SensorReadingRepository
 * @package App\Repositories
 * @version April 6, 2020, 10:45 pm UTC
*/

class SensorReadingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'sensor_id',
        'reading',
        'type'
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
        return SensorReading::class;
    }
}
