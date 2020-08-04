<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Sensor;

class SensorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, RefreshDatabase;

    /**
     * @test
     */
    public function test_create_sensor()
    {
        $sensor = factory(Sensor::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sensors', $sensor
        );

        $this->assertApiResponse($sensor);
    }

    /**
     * @test
     */
    public function test_read_sensor()
    {
        $sensor = factory(Sensor::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sensors/'.$sensor->id
        );

        $this->assertApiResponse($sensor->toArray());
    }

    /**
     * @test
     */
    public function test_update_sensor()
    {
        $sensor = factory(Sensor::class)->create();
        $editedSensor = factory(Sensor::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sensors/'.$sensor->id,
            $editedSensor
        );

        $this->assertApiResponse($editedSensor);
    }

    /**
     * @test
     */
    public function test_delete_sensor()
    {
        $sensor = factory(Sensor::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sensors/'.$sensor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sensors/'.$sensor->id
        );

        $this->response->assertStatus(404);
    }
}
