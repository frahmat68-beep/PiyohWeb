<?php

namespace Tests\Feature;

use App\Models\Outlet;
use App\Models\Setting;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_home_page_returns_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Piyoh Kopi Galaxy');
    }

    public function test_about_page_returns_successful_response(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function test_outlet_index_only_displays_active_outlets(): void
    {
        $response = $this->get('/outlet');
        $response->assertStatus(200);
        $response->assertSee('Piyoh Kopi Galaxy');
        // Outlet Bekasi is inactive (is_active = false), should not be visible
        $response->assertDontSee('Piyoh Kopi Bekasi');
    }

    public function test_outlet_show_accessible_for_active_and_404_for_inactive(): void
    {
        // Galaxy is active
        $responseGalaxy = $this->get('/outlet/galaxy');
        $responseGalaxy->assertStatus(200);
        $responseGalaxy->assertSee('Piyoh Kopi Galaxy');

        // Bekasi is inactive
        $responseBekasi = $this->get('/outlet/bekasi');
        $responseBekasi->assertStatus(404);
    }

    public function test_menu_page_returns_successful_response(): void
    {
        $response = $this->get('/menu');
        $response->assertStatus(200);
        $response->assertSee('Kopi Susu Piyoh');
    }

    public function test_careers_page_returns_successful_response(): void
    {
        $response = $this->get('/careers');
        $response->assertStatus(200);
    }

    public function test_contact_page_renders_dynamic_settings_and_no_dummy_number(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        
        // Assert dummy hardcoded number does not exist
        $response->assertDontSee('+62 812-3456-7890');

        // Assert dynamic settings are rendered
        $response->assertSee('info@piyohkopi.com');
        $response->assertSee('6281239999731');
    }
}
