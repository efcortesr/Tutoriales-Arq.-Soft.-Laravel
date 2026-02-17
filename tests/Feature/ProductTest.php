<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_create_page_shows_form(): void
    {
        $response = $this->get(route('product.create'));

        $response->assertStatus(200);
        $response->assertSee('Create product');
    }

    public function test_save_requires_name_and_price(): void
    {
        $response = $this->post(route('product.save'), []);

        $response->assertSessionHasErrors(['name', 'price']);
    }

    public function test_store_product_and_index_shows_it(): void
    {
        $response = $this->post(route('product.save'), [
            'name' => 'Test product',
            'price' => '12.50',
            'description' => 'Desc test',
        ]);

        $response->assertRedirect(route('product.index'));
        $response->assertSessionHas('success');

        $this->get(route('product.index'))
            ->assertStatus(200)
            ->assertSee('Test product')
            ->assertSee('12.50');
    }
}
