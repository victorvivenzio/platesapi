<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AllergenTest extends TestCase
{
    /**
     * Create Allergen Test
     */
    public function testCreateAllergen()
    {
        $data = [
            'name' => "New Allergen",
            'description' => "Plate",
        ];
        $response = $this->json('POST', '/apiv1/allergens',$data);
        $response->assertStatus(200);
        $response->assertJson($data);
    }

    /**
     * Create Allergen Test
     */
    public function testGettingAllAllergens()
    {
        $response = $this->json('GET', '/apiv1/allergens');
        $response->assertStatus(200);

        $response->assertJsonStructure(
            [
                'data' => [
                    [
                        'id',
                        'name',
                        'description',
                    ]
                ]
            ]
        );
    }
    /**
     * Get All Allergens Test
     */
    public function testGettingAllergen()
    {
        $response = $this->json('GET', '/apiv1/allergens');
        $response->assertStatus(200);

        $allergens = $response->getData()->data[0];

        $response = $this->json('GET', '/apiv1/allergens/' . $allergens->id);
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                'id',
                'name',
                'description',
            ]
        );
    }

    /**
     * Update Allergens Test
     */
    public function testUpdateAllergen()
    {
        $response = $this->json('GET', '/apiv1/allergens');
        $response->assertStatus(200);

        $allergen = $response->getData()->data[0];

        $update = $this->json('PATCH', '/apiv1/allergens/'.$allergen->id, ['name' => "Changed for test"]);
        $update->assertStatus(200);
    }

    /**
     * Delete Allergen Test
     */
    public function testDeleteAllergen()
    {
        $response = $this->json('GET', '/apiv1/allergens');
        $response->assertStatus(200);

        $allergen = $response->getData()->data[0];

        $delete = $this->json('DELETE', '/apiv1/allergens/'.$allergen->id);
        $delete->assertStatus(200);
    }
}
