<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SensorReading;

class SensorReadingApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, RefreshDatabase;

    /**
     * @test
     */
    public function test_create_sensor_reading()
    {
        $sensorReading = factory(SensorReading::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sensor_readings', $sensorReading
        );

        $this->assertApiResponse($sensorReading);
    }

    /**
     * @test
     */
    public function test_read_sensor_reading()
    {
        $sensorReading = factory(SensorReading::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sensor_readings/'.$sensorReading->id
        );

        $this->assertApiResponse($sensorReading->toArray());
    }

    /**
     * @test
     */
    public function test_update_sensor_reading()
    {
        $sensorReading = factory(SensorReading::class)->create();
        $editedSensorReading = factory(SensorReading::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sensor_readings/'.$sensorReading->id,
            $editedSensorReading
        );

        $this->assertApiResponse($editedSensorReading);
    }

    /**
     * @test
     */
    public function test_delete_sensor_reading()
    {
        $sensorReading = factory(SensorReading::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sensor_readings/'.$sensorReading->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sensor_readings/'.$sensorReading->id
        );

        $this->response->assertStatus(404);
    }
}
