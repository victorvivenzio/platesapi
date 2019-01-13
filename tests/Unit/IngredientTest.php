<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IngredientTest extends TestCase
{
    /**
     * Create Ingredient Test
     */
    public function testCreateIngredient()
    {
        $data = [
            'name' => "New Ingredient",
            'description' => "ingredient",
        ];
        $response = $this->json('POST', '/apiv1/ingredients',$data);
        $response->assertStatus(200);
        $response->assertJson($data);
    }

    /**
     * Create Ingredient Test
     */
    public function testGettingAllIngredients()
    {
        $response = $this->json('GET', '/apiv1/ingredients');
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
     * Get All Ingredients Test
     */
    public function testGettingIngredients()
    {
        $response = $this->json('GET', '/apiv1/ingredients');
        $response->assertStatus(200);

        $ingredients = $response->getData()->data[0];

        $response = $this->json('GET', '/apiv1/ingredients/' . $ingredients->id);
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
     * Update Ingredient Test
     */
    public function testUpdateIngredient()
    {
        $response = $this->json('GET', '/apiv1/ingredients');
        $response->assertStatus(200);

        $ingredient = $response->getData()->data[0];

        $update = $this->json('PATCH', '/apiv1/ingredients/'.$ingredient->id, ['name' => "Changed for test"]);
        $update->assertStatus(200);
    }

    /**
     * Delete Ingredient Test
     */
    public function testDeleteIngredient()
    {
        $response = $this->json('GET', '/apiv1/ingredients');
        $response->assertStatus(200);

        $ingredient = $response->getData()->data[0];

        $delete = $this->json('DELETE', '/apiv1/ingredients/'.$ingredient->id);
        $delete->assertStatus(200);
    }

}
