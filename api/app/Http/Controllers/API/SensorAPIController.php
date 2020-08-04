<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSensorAPIRequest;
use App\Http\Requests\API\UpdateSensorAPIRequest;
use App\Models\Sensor;
use App\Repositories\SensorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SensorController
 * @package App\Http\Controllers\API
 */

class SensorAPIController extends AppBaseController
{
    /** @var  SensorRepository */
    private $sensorRepository;

    public function __construct(SensorRepository $sensorRepo)
    {
        $this->sensorRepository = $sensorRepo;
    }

    /**
     * Display a listing of the Sensor.
     * GET|HEAD /sensors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sensors = $this->sensorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sensors->toArray(), 'Sensors retrieved successfully');
    }

    /**
     * Store a newly created Sensor in storage.
     * POST /sensors
     *
     * @param CreateSensorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSensorAPIRequest $request)
    {
        $input = $request->all();

        $sensor = $this->sensorRepository->create($input);

        return $this->sendResponse($sensor->toArray(), 'Sensor saved successfully');
    }

    /**
     * Display the specified Sensor.
     * GET|HEAD /sensors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Sensor $sensor */
        $sensor = $this->sensorRepository->find($id);

        if (empty($sensor)) {
            return $this->sendError('Sensor not found');
        }

        return $this->sendResponse($sensor->toArray(), 'Sensor retrieved successfully');
    }

    /**
     * Update the specified Sensor in storage.
     * PUT/PATCH /sensors/{id}
     *
     * @param int $id
     * @param UpdateSensorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSensorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Sensor $sensor */
        $sensor = $this->sensorRepository->find($id);

        if (empty($sensor)) {
            return $this->sendError('Sensor not found');
        }

        $sensor = $this->sensorRepository->update($input, $id);

        return $this->sendResponse($sensor->toArray(), 'Sensor updated successfully');
    }

    /**
     * Remove the specified Sensor from storage.
     * DELETE /sensors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Sensor $sensor */
        $sensor = $this->sensorRepository->find($id);

        if (empty($sensor)) {
            return $this->sendError('Sensor not found');
        }

        $sensor->delete();

        return $this->sendSuccess('Sensor deleted successfully');
    }
}
