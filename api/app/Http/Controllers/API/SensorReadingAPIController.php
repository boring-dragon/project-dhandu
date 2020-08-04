<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSensorReadingAPIRequest;
use App\Http\Requests\API\UpdateSensorReadingAPIRequest;
use App\Models\SensorReading;
use App\Repositories\SensorReadingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SensorReadingController
 * @package App\Http\Controllers\API
 */

class SensorReadingAPIController extends AppBaseController
{
    /** @var  SensorReadingRepository */
    private $sensorReadingRepository;

    public function __construct(SensorReadingRepository $sensorReadingRepo)
    {
        $this->sensorReadingRepository = $sensorReadingRepo;
    }

    /**
     * Display a listing of the SensorReading.
     * GET|HEAD /sensorReadings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sensorReadings = $this->sensorReadingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sensorReadings->toArray(), 'Sensor Readings retrieved successfully');
    }

    /**
     * Store a newly created SensorReading in storage.
     * POST /sensorReadings
     *
     * @param CreateSensorReadingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSensorReadingAPIRequest $request)
    {
        $input = $request->all();

        $sensorReading = $this->sensorReadingRepository->create($input);

        return $this->sendResponse($sensorReading->toArray(), 'Sensor Reading saved successfully');
    }

    /**
     * Display the specified SensorReading.
     * GET|HEAD /sensorReadings/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SensorReading $sensorReading */
        $sensorReading = $this->sensorReadingRepository->find($id);

        if (empty($sensorReading)) {
            return $this->sendError('Sensor Reading not found');
        }

        return $this->sendResponse($sensorReading->toArray(), 'Sensor Reading retrieved successfully');
    }

    /**
     * Update the specified SensorReading in storage.
     * PUT/PATCH /sensorReadings/{id}
     *
     * @param int $id
     * @param UpdateSensorReadingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSensorReadingAPIRequest $request)
    {
        $input = $request->all();

        /** @var SensorReading $sensorReading */
        $sensorReading = $this->sensorReadingRepository->find($id);

        if (empty($sensorReading)) {
            return $this->sendError('Sensor Reading not found');
        }

        $sensorReading = $this->sensorReadingRepository->update($input, $id);

        return $this->sendResponse($sensorReading->toArray(), 'SensorReading updated successfully');
    }

    /**
     * Remove the specified SensorReading from storage.
     * DELETE /sensorReadings/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SensorReading $sensorReading */
        $sensorReading = $this->sensorReadingRepository->find($id);

        if (empty($sensorReading)) {
            return $this->sendError('Sensor Reading not found');
        }

        $sensorReading->delete();

        return $this->sendSuccess('Sensor Reading deleted successfully');
    }
}
