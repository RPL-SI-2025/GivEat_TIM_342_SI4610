<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\PartnerRestaurant;

class PartnerRestaurantTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_partner_restaurant()
    {
        $response = $this->post('/partner', [
            'name' => 'Warung Test',
            'address' => 'Jl. Laravel 123',
            'latitude' => -6.2,
            'longitude' => 106.8,
            'operational_hours' => '08:00 - 20:00',
        ]);

        $response->assertStatus(302); // Redirect
        $this->assertDatabaseHas('partner_restaurants', [
            'name' => 'Warung Test',
            'address' => 'Jl. Laravel 123',
        ]);
    }

    /** @test */
    public function user_can_see_partner_list()
    {
        PartnerRestaurant::create([
            'name' => 'Warung Tampil',
            'address' => 'Jl. Daftar',
            'latitude' => -6.3,
            'longitude' => 106.7,
        ]);

        $response = $this->get('/partner');
        $response->assertStatus(200);
        $response->assertSee('Warung Tampil');
    }

    /** @test */
    public function user_can_update_partner_restaurant()
    {
        $mitra = PartnerRestaurant::create([
            'name' => 'Warung Lama',
            'address' => 'Jl. Lama',
            'latitude' => -6.4,
            'longitude' => 106.6,
        ]);

        $response = $this->put("/partner/{$mitra->id}", [
            'name' => 'Warung Baru',
            'address' => 'Jl. Baru',
            'latitude' => -6.5,
            'longitude' => 106.5,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('partner_restaurants', [
            'name' => 'Warung Baru',
            'address' => 'Jl. Baru',
        ]);
    }

    /** @test */
    public function user_can_delete_partner_restaurant()
    {
        $mitra = PartnerRestaurant::create([
            'name' => 'Warung Hapus',
            'address' => 'Jl. Sementara',
            'latitude' => -6.6,
            'longitude' => 106.4,
        ]);

        $response = $this->delete("/partner/{$mitra->id}");
        $response->assertStatus(302);

        $this->assertDatabaseMissing('partner_restaurants', [
            'id' => $mitra->id,
        ]);
    }

    /** @test */
    public function name_is_required_to_create()
    {
        $response = $this->post('/partner', [
            'name' => '',
            'address' => 'Tanpa Nama',
            'latitude' => -6.2,
            'longitude' => 106.8,
        ]);

        $response->assertSessionHasErrors('name');
    }
}
