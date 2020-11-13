<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Teacher;

class TeacherApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_teacher()
    {
        $teacher = factory(Teacher::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/teachers', $teacher
        );

        $this->assertApiResponse($teacher);
    }

    /**
     * @test
     */
    public function test_read_teacher()
    {
        $teacher = factory(Teacher::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/teachers/'.$teacher->id
        );

        $this->assertApiResponse($teacher->toArray());
    }

    /**
     * @test
     */
    public function test_update_teacher()
    {
        $teacher = factory(Teacher::class)->create();
        $editedTeacher = factory(Teacher::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/teachers/'.$teacher->id,
            $editedTeacher
        );

        $this->assertApiResponse($editedTeacher);
    }

    /**
     * @test
     */
    public function test_delete_teacher()
    {
        $teacher = factory(Teacher::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/teachers/'.$teacher->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/teachers/'.$teacher->id
        );

        $this->response->assertStatus(404);
    }
}
