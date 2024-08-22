<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_create_product()
    {
        $data = [
            'name' => 'Test Product',
            'price' => 99.99,
            'quantity' => 10,
            'category_id' => 1,
        ];
    
        $this->postJson('/api/products', $data)
             ->assertStatus(201)
             ->assertJson(['name' => 'Test Product']);
    }
    
    public function test_can_get_product()
    {
        $product = Product::factory()->create();
    
        $this->getJson('/api/products/' . $product->id)
             ->assertStatus(200)
             ->assertJson(['id' => $product->id]);
    }
    
}
