<?php namespace Tests\Repositories;

use App\Models\Threshold;
use App\Repositories\ThresholdRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ThresholdRepositoryTest extends TestCase
{
    use ApiTestTrait, RefreshDatabase;

    /**
     * @var ThresholdRepository
     */
    protected $thresholdRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->thresholdRepo = \App::make(ThresholdRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_threshold()
    {
        $threshold = factory(Threshold::class)->make()->toArray();

        $createdThreshold = $this->thresholdRepo->create($threshold);

        $createdThreshold = $createdThreshold->toArray();
        $this->assertArrayHasKey('id', $createdThreshold);
        $this->assertNotNull($createdThreshold['id'], 'Created Threshold must have id specified');
        $this->assertNotNull(Threshold::find($createdThreshold['id']), 'Threshold with given id must be in DB');
        $this->assertModelData($threshold, $createdThreshold);
    }

    /**
     * @test read
     */
    public function test_read_threshold()
    {
        $threshold = factory(Threshold::class)->create();

        $dbThreshold = $this->thresholdRepo->find($threshold->id);

        $dbThreshold = $dbThreshold->toArray();
        $this->assertModelData($threshold->toArray(), $dbThreshold);
    }

    /**
     * @test update
     */
    public function test_update_threshold()
    {
        $threshold = factory(Threshold::class)->create();
        $fakeThreshold = factory(Threshold::class)->make()->toArray();

        $updatedThreshold = $this->thresholdRepo->update($fakeThreshold, $threshold->id);

        $this->assertModelData($fakeThreshold, $updatedThreshold->toArray());
        $dbThreshold = $this->thresholdRepo->find($threshold->id);
        $this->assertModelData($fakeThreshold, $dbThreshold->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_threshold()
    {
        $threshold = factory(Threshold::class)->create();

        $resp = $this->thresholdRepo->delete($threshold->id);

        $this->assertTrue($resp);
        $this->assertNull(Threshold::find($threshold->id), 'Threshold should not exist in DB');
    }
}
