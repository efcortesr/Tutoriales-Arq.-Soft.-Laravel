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

    public function test_price_must_be_gt_zero(): void
    {
        $response = $this->post(route('product.save'), [
            'name' => 'Zero price',
            'price' => '0',
        ]);

        $response->assertSessionHasErrors(['price']);
    }

    public function test_show_redirects_to_home_on_invalid_id(): void
    {
        $response = $this->get(route('product.show', ['id' => 9999]));

        $response->assertRedirect(route('home.index'));
    }

    public function test_expensive_product_name_is_red(): void
    {
        // product id 1 has price 499.99 in the demo data
        $response = $this->get(route('product.show', ['id' => 1]));

        $response->assertStatus(200);
        $response->assertSee('<span class="text-danger">', false);
        $response->assertSee('TV');
    }

    public function test_store_product_and_index_shows_it(): void
    {
        $response = $this->post(route('product.save'), [
            'name' => 'Test product',
            'price' => '12.50',
            'description' => 'Desc test',
        ]);

        // ahora mostramos una vista de éxito
        $response->assertStatus(200);
        $response->assertSee('Product created successfully!');

        // el producto se guarda en sesión (demo) y aparece en el índice
        $this->get(route('product.index'))
            ->assertStatus(200)
            ->assertSee('Test product')
            ->assertSee('12.50');
    }
}
