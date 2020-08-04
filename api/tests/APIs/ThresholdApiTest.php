<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Threshold;

class ThresholdApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware,RefreshDatabase;

    /**
     * @test
     */
    public function test_create_threshold()
    {
        $threshold = factory(Threshold::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/thresholds', $threshold
        );

        $this->assertApiResponse($threshold);
    }

    /**
     * @test
     */
    public function test_read_threshold()
    {
        $threshold = factory(Threshold::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/thresholds/'.$threshold->id
        );

        $this->assertApiResponse($threshold->toArray());
    }

    /**
     * @test
     */
    public function test_update_threshold()
    {
        $threshold = factory(Threshold::class)->create();
        $editedThreshold = factory(Threshold::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/thresholds/'.$threshold->id,
            $editedThreshold
        );

        $this->assertApiResponse($editedThreshold);
    }

    /**
     * @test
     */
    public function test_delete_threshold()
    {
        $threshold = factory(Threshold::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/thresholds/'.$threshold->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/thresholds/'.$threshold->id
        );

        $this->response->assertStatus(404);
    }
}
