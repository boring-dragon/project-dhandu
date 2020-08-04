<?php namespace Tests\Repositories;

use App\Models\Sensor;
use App\Repositories\SensorRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SensorRepositoryTest extends TestCase
{
    use ApiTestTrait, RefreshDatabase;

    /**
     * @var SensorRepository
     */
    protected $sensorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sensorRepo = \App::make(SensorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sensor()
    {
        $sensor = factory(Sensor::class)->make()->toArray();

        $createdSensor = $this->sensorRepo->create($sensor);

        $createdSensor = $createdSensor->toArray();
        $this->assertArrayHasKey('id', $createdSensor);
        $this->assertNotNull($createdSensor['id'], 'Created Sensor must have id specified');
        $this->assertNotNull(Sensor::find($createdSensor['id']), 'Sensor with given id must be in DB');
        $this->assertModelData($sensor, $createdSensor);
    }

    /**
     * @test read
     */
    public function test_read_sensor()
    {
        $sensor = factory(Sensor::class)->create();

        $dbSensor = $this->sensorRepo->find($sensor->id);

        $dbSensor = $dbSensor->toArray();
        $this->assertModelData($sensor->toArray(), $dbSensor);
    }

    /**
     * @test update
     */
    public function test_update_sensor()
    {
        $sensor = factory(Sensor::class)->create();
        $fakeSensor = factory(Sensor::class)->make()->toArray();

        $updatedSensor = $this->sensorRepo->update($fakeSensor, $sensor->id);

        $this->assertModelData($fakeSensor, $updatedSensor->toArray());
        $dbSensor = $this->sensorRepo->find($sensor->id);
        $this->assertModelData($fakeSensor, $dbSensor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sensor()
    {
        $sensor = factory(Sensor::class)->create();

        $resp = $this->sensorRepo->delete($sensor->id);

        $this->assertTrue($resp);
        $this->assertNull(Sensor::find($sensor->id), 'Sensor should not exist in DB');
    }
}
