<?php

namespace App\Repositories;

use App\Models\Threshold;
use App\Repositories\BaseRepository;

/**
 * Class ThresholdRepository
 * @package App\Repositories
 * @version April 13, 2020, 9:40 pm UTC
*/

class ThresholdRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'limit',
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
        return Threshold::class;
    }
    
    /**
     * GetLatestThresholds
     * 
     *  Get the thresholds
     *
     * @return void
     */
    public function GetLatestThresholds()
    {
        $thresholds = collect([
            'pump' => Threshold::where('type', 'pump')->get()->last(),
            'valves' => Threshold::where('type', 'valves')->get()->last()
        ]);

        return $thresholds;
    }
}
