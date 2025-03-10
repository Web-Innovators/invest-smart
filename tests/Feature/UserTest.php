<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase; // Resets database after each test
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_homepage_loads_correctly()
    {
        $response = $this->get('/'); // Simulate visiting the homepage
        $response->assertStatus(200); // Expect HTTP status 200
    }
}
