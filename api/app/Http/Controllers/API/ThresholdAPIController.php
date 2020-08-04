<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateThresholdAPIRequest;
use App\Http\Requests\API\UpdateThresholdAPIRequest;
use App\Models\Threshold;
use App\Repositories\ThresholdRepository;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ThresholdController
 * @package App\Http\Controllers\API
 */

class ThresholdAPIController extends AppBaseController
{
    /** @var  ThresholdRepository */
    private $thresholdRepository;

    public function __construct(ThresholdRepository $thresholdRepo)
    {
        $this->thresholdRepository = $thresholdRepo;
    }

    /**
     * Display a list of latest thresholds
     * GET|HEAD /thresholds
     *
     * @return Response
     */
    public function index()
    {
        $thresholds = $this->thresholdRepository->GetLatestThresholds();

        return $this->sendResponse($thresholds->toArray(), 'Thresholds retrieved successfully');
    }

    /**
     * Store a newly created Threshold in storage.
     * POST /thresholds
     *
     * @param CreateThresholdAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateThresholdAPIRequest $request)
    {
        $input = $request->all();

        $threshold = $this->thresholdRepository->create($input);

        return $this->sendResponse($threshold->toArray(), 'Threshold saved successfully');
    }

    /**
     * Display the specified Threshold.
     * GET|HEAD /thresholds/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Threshold $threshold */
        $threshold = $this->thresholdRepository->find($id);

        if (empty($threshold)) {
            return $this->sendError('Threshold not found');
        }

        return $this->sendResponse($threshold->toArray(), 'Threshold retrieved successfully');
    }

    /**
     * Update the specified Threshold in storage.
     * PUT/PATCH /thresholds/{id}
     *
     * @param int $id
     * @param UpdateThresholdAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateThresholdAPIRequest $request)
    {
        $input = $request->all();

        /** @var Threshold $threshold */
        $threshold = $this->thresholdRepository->find($id);

        if (empty($threshold)) {
            return $this->sendError('Threshold not found');
        }

        $threshold = $this->thresholdRepository->update($input, $id);

        return $this->sendResponse($threshold->toArray(), 'Threshold updated successfully');
    }

    /**
     * Remove the specified Threshold from storage.
     * DELETE /thresholds/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Threshold $threshold */
        $threshold = $this->thresholdRepository->find($id);

        if (empty($threshold)) {
            return $this->sendError('Threshold not found');
        }

        $threshold->delete();

        return $this->sendSuccess('Threshold deleted successfully');
    }
}
