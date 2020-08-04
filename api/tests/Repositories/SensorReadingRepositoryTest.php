<?php namespace Tests\Repositories;

use App\Models\SensorReading;
use App\Repositories\SensorReadingRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SensorReadingRepositoryTest extends TestCase
{
    use ApiTestTrait, RefreshDatabase;

    /**
     * @var SensorReadingRepository
     */
    protected $sensorReadingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sensorReadingRepo = \App::make(SensorReadingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sensor_reading()
    {
        $sensorReading = factory(SensorReading::class)->make()->toArray();

        $createdSensorReading = $this->sensorReadingRepo->create($sensorReading);

        $createdSensorReading = $createdSensorReading->toArray();
        $this->assertArrayHasKey('id', $createdSensorReading);
        $this->assertNotNull($createdSensorReading['id'], 'Created SensorReading must have id specified');
        $this->assertNotNull(SensorReading::find($createdSensorReading['id']), 'SensorReading with given id must be in DB');
        $this->assertModelData($sensorReading, $createdSensorReading);
    }

    /**
     * @test read
     */
    public function test_read_sensor_reading()
    {
        $sensorReading = factory(SensorReading::class)->create();

        $dbSensorReading = $this->sensorReadingRepo->find($sensorReading->id);

        $dbSensorReading = $dbSensorReading->toArray();
        $this->assertModelData($sensorReading->toArray(), $dbSensorReading);
    }

    /**
     * @test update
     */
    public function test_update_sensor_reading()
    {
        $sensorReading = factory(SensorReading::class)->create();
        $fakeSensorReading = factory(SensorReading::class)->make()->toArray();

        $updatedSensorReading = $this->sensorReadingRepo->update($fakeSensorReading, $sensorReading->id);

        $this->assertModelData($fakeSensorReading, $updatedSensorReading->toArray());
        $dbSensorReading = $this->sensorReadingRepo->find($sensorReading->id);
        $this->assertModelData($fakeSensorReading, $dbSensorReading->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sensor_reading()
    {
        $sensorReading = factory(SensorReading::class)->create();

        $resp = $this->sensorReadingRepo->delete($sensorReading->id);

        $this->assertTrue($resp);
        $this->assertNull(SensorReading::find($sensorReading->id), 'SensorReading should not exist in DB');
    }
}
