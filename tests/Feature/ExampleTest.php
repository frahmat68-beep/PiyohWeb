<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\PageSeeder;
use Database\Seeders\OutletSeeder;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // Seed pages & outlets database
        $this->seed(PageSeeder::class);
        $this->seed(OutletSeeder::class);

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
