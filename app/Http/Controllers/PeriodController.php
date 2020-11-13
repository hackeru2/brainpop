<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Repositories\PeriodRepository;
use App\models\Student;
use App\models\Period;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PeriodController extends AppBaseController
{
    /** @var  PeriodRepository */
    private $periodRepository;

    public function __construct(PeriodRepository $periodRepo)
    {
        $this->periodRepository = $periodRepo;
    }

    /**
     * Display a listing of the Period.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $periods = $this->periodRepository->all();

        return view('periods.index')
            ->with('periods', $periods);
    }

    /**
     * Show the form for creating a new Period.
     *
     * @return Response
     */
    public function create()
    {
        return view('periods.create');
    }

    /**
     * Store a newly created Period in storage.
     *
     * @param CreatePeriodRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodRequest $request)
    {
        $input = $request->all();

        $period = $this->periodRepository->create($input);

        Flash::success('Period saved successfully.');

        return redirect(route('periods.index'));
    }

    /**
     * Display the specified Period.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $period = $this->periodRepository->find($id);

        if (empty($period)) {
            Flash::error('Period not found');

            return redirect(route('periods.index'));
        }

        return view('periods.show')->with('period', $period);
    }

    /**
     * Show the form for editing the specified Period.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $period = $this->periodRepository->find($id);

        if (empty($period)) {
            Flash::error('Period not found');

            return redirect(route('periods.index'));
        }

        //return view('periods.edit')->with('period', $period , Student::all());
        return view('periods.edit', ['period' =>  $period , 'students' => Student::all()]);
    }

    /**
     * Update the specified Period in storage.
     *
     * @param int $id
     * @param UpdatePeriodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodRequest $request)
    {
       

         
        $period = $this->periodRepository->find($id);
        

        if (empty($period)) {
            Flash::error('Period not found');

            return redirect(route('periods.index'));
        }

        $period = $this->periodRepository->update($request->all(), $id);
         
        $this->updateStudents
        (Period::find($id) , $request->students);

        Flash::success('Period updated successfully.');

        return redirect(route('periods.index'));
    }

    /**
     * Remove the specified Period from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $period = $this->periodRepository->find($id);

        if (empty($period)) {
            Flash::error('Period not found');

            return redirect(route('periods.index'));
        }

        $this->periodRepository->delete($id);

        Flash::success('Period deleted successfully.');

        return redirect(route('periods.index'));
    }

    public function updateStudents(Period $period , $periodStudents  )
    {
         
        $studentsIDs = !$periodStudents ? [] :  explode( ',' ,  $periodStudents );
        $period->students()->sync($studentsIDs) ;

    }
}
