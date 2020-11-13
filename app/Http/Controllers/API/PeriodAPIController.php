<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePeriodAPIRequest;
use App\Http\Requests\API\UpdatePeriodAPIRequest;
use App\Models\Period;
use App\Repositories\PeriodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PeriodController
 * @package App\Http\Controllers\API
 */

class PeriodAPIController extends AppBaseController
{
    /** @var  PeriodRepository */
    private $periodRepository;

    public function __construct(PeriodRepository $periodRepo)
    {
        $this->periodRepository = $periodRepo;
    }

    /**
     * Display a listing of the Period.
     * GET|HEAD /periods
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $periods = $this->periodRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($periods->toArray(), 'Periods retrieved successfully');
    }

    /**
     * Store a newly created Period in storage.
     * POST /periods
     *
     * @param CreatePeriodAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodAPIRequest $request)
    {
        $input = $request->all();

        $period = $this->periodRepository->create($input);

        return $this->sendResponse($period->toArray(), 'Period saved successfully');
    }

    /**
     * Display the specified Period.
     * GET|HEAD /periods/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Period $period */
        $period = $this->periodRepository->find($id);

        if (empty($period)) {
            return $this->sendError('Period not found');
        }

        return $this->sendResponse($period->toArray(), 'Period retrieved successfully');
    }

    /**
     * Update the specified Period in storage.
     * PUT/PATCH /periods/{id}
     *
     * @param int $id
     * @param UpdatePeriodAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodAPIRequest $request)
    {
        $input = $request->all();

        /** @var Period $period */
        $period = $this->periodRepository->find($id);

        if (empty($period)) {
            return $this->sendError('Period not found');
        }

        $period = $this->periodRepository->update($input, $id);

        return $this->sendResponse($period->toArray(), 'Period updated successfully');
    }

    /**
     * Remove the specified Period from storage.
     * DELETE /periods/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Period $period */
        $period = $this->periodRepository->find($id);

        if (empty($period)) {
            return $this->sendError('Period not found');
        }

        $period->delete();

        return $this->sendSuccess('Period deleted successfully');
    }
}
