<?php namespace Tests\Repositories;

use App\Models\Period;
use App\Repositories\PeriodRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PeriodRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PeriodRepository
     */
    protected $periodRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->periodRepo = \App::make(PeriodRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_period()
    {
        $period = factory(Period::class)->make()->toArray();

        $createdPeriod = $this->periodRepo->create($period);

        $createdPeriod = $createdPeriod->toArray();
        $this->assertArrayHasKey('id', $createdPeriod);
        $this->assertNotNull($createdPeriod['id'], 'Created Period must have id specified');
        $this->assertNotNull(Period::find($createdPeriod['id']), 'Period with given id must be in DB');
        $this->assertModelData($period, $createdPeriod);
    }

    /**
     * @test read
     */
    public function test_read_period()
    {
        $period = factory(Period::class)->create();

        $dbPeriod = $this->periodRepo->find($period->id);

        $dbPeriod = $dbPeriod->toArray();
        $this->assertModelData($period->toArray(), $dbPeriod);
    }

    /**
     * @test update
     */
    public function test_update_period()
    {
        $period = factory(Period::class)->create();
        $fakePeriod = factory(Period::class)->make()->toArray();

        $updatedPeriod = $this->periodRepo->update($fakePeriod, $period->id);

        $this->assertModelData($fakePeriod, $updatedPeriod->toArray());
        $dbPeriod = $this->periodRepo->find($period->id);
        $this->assertModelData($fakePeriod, $dbPeriod->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_period()
    {
        $period = factory(Period::class)->create();

        $resp = $this->periodRepo->delete($period->id);

        $this->assertTrue($resp);
        $this->assertNull(Period::find($period->id), 'Period should not exist in DB');
    }
}
