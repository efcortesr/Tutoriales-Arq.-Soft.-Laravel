<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_contact_page_shows_author_info(): void
    {
        $response = $this->get(route('home.contact'));

        $response->assertStatus(200);
        $response->assertSee('Contact');
        $response->assertSee('Daniel Correa');
        $response->assertSee('123 Laravel St');
        $response->assertSee('+57');
    }

    public function test_header_contains_products_and_create_links(): void
    {
        $response = $this->get(route('home.index'));

        $response->assertStatus(200);
        $response->assertSee('Products');
        $response->assertSee('Create Products');
        $response->assertSee('Contact');
    }
}
