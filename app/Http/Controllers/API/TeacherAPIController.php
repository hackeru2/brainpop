<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTeacherAPIRequest;
use App\Http\Requests\API\UpdateTeacherAPIRequest;
use App\Models\Teacher;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TeacherController
 * @package App\Http\Controllers\API
 */

class TeacherAPIController extends AppBaseController
{
    /** @var  TeacherRepository */
    private $teacherRepository;

    public function __construct(TeacherRepository $teacherRepo)
    {
        $this->middleWare('auth:api')->except(['store']);  
        $this->teacherRepository = $teacherRepo;
    }

    /**
     * Display a listing of the Teacher.
     * GET|HEAD /teachers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $teachers = $this->teacherRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($teachers->toArray(), 'Teachers retrieved successfully');
    }

    /**
     * Store a newly created Teacher in storage.
     * POST /teachers
     *
     * @param CreateTeacherAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTeacherAPIRequest $request)
    {
         
        $input = $request->all();

        $teacher = $this->teacherRepository->create($input);

        return $this->sendResponse($teacher->toArray(), 'Teacher saved successfully');
    }

    /**
     * Display the specified Teacher.
     * GET|HEAD /teachers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Teacher $teacher */
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            return $this->sendError('Teacher not found');
        }

        return $this->sendResponse($teacher->toArray(), 'Teacher retrieved successfully');
    }

    /**
     * Update the specified Teacher in storage.
     * PUT/PATCH /teachers/{id}
     *
     * @param int $id
     * @param UpdateTeacherAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeacherAPIRequest $request)
    {
        $input = $request->all();

        /** @var Teacher $teacher */
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            return $this->sendError('Teacher not found');
        }

        $teacher = $this->teacherRepository->update($input, $id);

        return $this->sendResponse($teacher->toArray(), 'Teacher updated successfully');
    }

    /**
     * Remove the specified Teacher from storage.
     * DELETE /teachers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Teacher $teacher */
        $teacher = $this->teacherRepository->find($id);

        if (empty($teacher)) {
            return $this->sendError('Teacher not found');
        }

        $teacher->delete();

        return $this->sendSuccess('Teacher deleted successfully');
    }

    public function students(Teacher $teacher )
    {
        return $teacher->students(); 
    }

    public function periods(Teacher $teacher )
    {
        return $teacher->periods; 
    }
}
