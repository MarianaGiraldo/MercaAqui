<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlProductsTest extends TestCase
{
    /**
     * A test for the productsCreate Route.
     *
     * @return void
     */
    public function test_url_products_create()
    {
        $response = $this->get('/productos/create');

        $response->assertStatus(302);
    }
}