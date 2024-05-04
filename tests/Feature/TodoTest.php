<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_a_user_can_create_a_new_todo(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
