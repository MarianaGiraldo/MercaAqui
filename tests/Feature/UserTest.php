<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlUserTest extends TestCase
{
    /**
     * A test for the userCreate Route.
     *
     * @return void
     */
    public function test_url_user_create()
    {
        $response = $this->get('/usuarios/create');

        $response->assertStatus(200);
    }
}