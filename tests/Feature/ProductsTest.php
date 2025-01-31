<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_homepage_contains_empty_table(): void
    {
        $user = User::factory()->create();


        $this->actingAs($user);

        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee(__('No products found'));
    }

    public function test_homepage_contains_table_with_data(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        Product::create([
            'name' => 'Product 1',
            'price' => 9.99,
            'description' => 'Description 1',
            'user_id' => $user->id,
        ]);

        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertDontSee(__('No products found'));
        $response->assertSee('Product 1');
    }
}
