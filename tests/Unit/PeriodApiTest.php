<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Period;
use App\Models\PeriodStudent;

class PeriodApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_period()
    {
        $period = Period::factory()->make()->toArray();
        $period['students'] = "1,2";
        $this->response = $this->json(
            'POST',
            '/api/periods', $period
        );

        $this->assertApiResponse($period);
    }

    /**
     * @test
     */
    public function test_read_period()
    {
        $period = Period::factory()->create();
        
        $this->response = $this->json(
            'GET',
            '/api/periods/'.$period->id
        );
        $period = $period->toArray();
         
         
        $this->assertApiResponse($period );
    }

    /**
     * @test
     */
    public function test_update_period()
    {
        $period = Period::factory()->create();
        $editedPeriod = Period::factory()->make()->toArray();
        $editedPeriod['students'] = "1,2";    
        $this->response = $this->json(
            'PUT',
            '/api/periods/'.$period->id,
            $editedPeriod
        );

        $this->assertApiResponse($editedPeriod);
    }

    /**
     * @test
     */
    public function test_delete_period()
    {
        $period = Period::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/periods/'.$period->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/periods/'.$period->id
        );

        $this->response->assertStatus(404);
    }
}
    