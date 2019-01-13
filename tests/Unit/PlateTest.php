<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlateTest extends TestCase
{
    /**
     * Create Plate Test
     */
    public function testCreatePlate()
    {
        $data = [
            'name' => "New Plate",
            'description' => "Plate",
            'price' => 10,
            'status' => 1,
            'category_id' => Category::inRandomOrder()->first()->id
        ];
        $response = $this->json('POST', '/apiv1/plates',$data);
        $response->assertStatus(200);
        $response->assertJson($data);
    }

    /**
     * Create Plate Test
     */
    public function testGettingAllPlates()
    {
        $response = $this->json('GET', '/apiv1/plates');
        $response->assertStatus(200);

        $response->assertJsonStructure(
            [
                'data' => [
                    [
                        'id',
                        'name',
                        'description',
                        'price',
                        'created_at',
                        'updated_at',
                        'category' => [
                            'id'
                        ]
                    ]
                ]
            ]
        );
    }
    /**
     * Create Plate Test
     */
    public function testGettingPlate()
    {
        $response = $this->json('GET', '/apiv1/plates');
        $response->assertStatus(200);

        $plate = $response->getData()->data[0];

        $response = $this->json('GET', '/apiv1/plates/' . $plate->id);
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'id',
                'name',
                'description',
                'price',
                'created_at',
                'updated_at',
                'category' => [
                    'id'
                ]
            ]
        );
    }

    public function testUpdatePlate()
    {
        $response = $this->json('GET', '/apiv1/plates');
        $response->assertStatus(200);

        $plate = $response->getData()->data[0];

        $update = $this->json('PATCH', '/apiv1/plates/'.$plate->id, ['name' => "Changed for test"]);
        $update->assertStatus(200);
    }

    public function testDeletePlate()
    {
        $response = $this->json('GET', '/apiv1/plates');
        $response->assertStatus(200);

        $plate = $response->getData()->data[0];

        $delete = $this->json('DELETE', '/apiv1/plates/'.$plate->id);
        $delete->assertStatus(200);
    }
}
