<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * Create Category Test
     */
    public function testCreateCategory()
    {
        $data = [
            'name' => "New Category",
            'description' => "categ",
        ];
        $response = $this->json('POST', '/apiv1/categories',$data);
        $response->assertStatus(200);
        $response->assertJson($data);
    }

    /**
     * Create Category Test
     */
    public function testGettingAllCategories()
    {
        $response = $this->json('GET', '/apiv1/categories');
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
     * Get All Categories Test
     */
    public function testGettingCategory()
    {
        $response = $this->json('GET', '/apiv1/categories');
        $response->assertStatus(200);

        $categories = $response->getData()->data[0];

        $response = $this->json('GET', '/apiv1/categories/' . $categories->id);
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
    public function testUpdateCategory()
    {
        $response = $this->json('GET', '/apiv1/categories');
        $response->assertStatus(200);

        $category = $response->getData()->data[0];

        $update = $this->json('PATCH', '/apiv1/categories/'.$category->id, ['name' => "Changed for test"]);
        $update->assertStatus(200);
    }

    /**
     * Delete Allergen Test
     */
    public function testDeleteCategory()
    {
        $response = $this->json('GET', '/apiv1/categories');
        $response->assertStatus(200);

        $category = $response->getData()->data[0];

        $delete = $this->json('DELETE', '/apiv1/categories/'.$category->id);
        $delete->assertStatus(200);
    }
}
