<?php namespace Tests\Repositories;

use App\Models\Teacher;
use App\Repositories\TeacherRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TeacherRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TeacherRepository
     */
    protected $teacherRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->teacherRepo = \App::make(TeacherRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_teacher()
    {
        $teacher = factory(Teacher::class)->make()->toArray();

        $createdTeacher = $this->teacherRepo->create($teacher);

        $createdTeacher = $createdTeacher->toArray();
        $this->assertArrayHasKey('id', $createdTeacher);
        $this->assertNotNull($createdTeacher['id'], 'Created Teacher must have id specified');
        $this->assertNotNull(Teacher::find($createdTeacher['id']), 'Teacher with given id must be in DB');
        $this->assertModelData($teacher, $createdTeacher);
    }

    /**
     * @test read
     */
    public function test_read_teacher()
    {
        $teacher = factory(Teacher::class)->create();

        $dbTeacher = $this->teacherRepo->find($teacher->id);

        $dbTeacher = $dbTeacher->toArray();
        $this->assertModelData($teacher->toArray(), $dbTeacher);
    }

    /**
     * @test update
     */
    public function test_update_teacher()
    {
        $teacher = factory(Teacher::class)->create();
        $fakeTeacher = factory(Teacher::class)->make()->toArray();

        $updatedTeacher = $this->teacherRepo->update($fakeTeacher, $teacher->id);

        $this->assertModelData($fakeTeacher, $updatedTeacher->toArray());
        $dbTeacher = $this->teacherRepo->find($teacher->id);
        $this->assertModelData($fakeTeacher, $dbTeacher->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_teacher()
    {
        $teacher = factory(Teacher::class)->create();

        $resp = $this->teacherRepo->delete($teacher->id);

        $this->assertTrue($resp);
        $this->assertNull(Teacher::find($teacher->id), 'Teacher should not exist in DB');
    }
}
