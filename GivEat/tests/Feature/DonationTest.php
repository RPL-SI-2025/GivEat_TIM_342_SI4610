<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DonationTest extends TestCase
{
    use RefreshDatabase;

    protected $category;

    protected function setUp(): void
    {
        parent::setUp();
        DB::table('partners')->insert([
            'id' => 1,
            'name' => 'Dummy Partner',
            'email' => 'dummy@partner.com',
            'phone' => '081234567890',
            'address' => 'Jl. Dummy No. 1',
        ]);
        $this->category = \App\Models\Category::factory()->create(['name' => 'Kategori Test']);
    }

    /** @test */
    public function tambah_donasi_berhasil()
    {
        Storage::fake('public');

        $futureDate = Carbon::now()->addDays(2);
        $response = $this->post('/donations', [
            'name' => 'Makanan Donasi',
            'description' => 'Deskripsi donasi',
            'category_id' => $this->category->id,
            'pickup_time' => $futureDate->format('Y-m-d H:i:s'),
            'portion' => 3,
            'location' => 'Bandung',
            'image' => UploadedFile::fake()->create('makanan.jpg', 100, 'image/jpeg'),
            'partner_id' => 1,
        ]);

        $response->assertRedirect(route('donations.index'));
        $this->assertDatabaseHas('donations', [
            'name' => 'Makanan Donasi',
            'category_id' => $this->category->id,
            'location' => 'Bandung',
            'partner_id' => 1,
        ]);
    }

    /** @test */
    public function lihat_daftar_donasi()
    {
        \App\Models\Donation::create([
            'name' => 'Donasi List Test',
            'description' => 'Deskripsi',
            'category_id' => $this->category->id,
            'pickup_time' => Carbon::now()->addDays(1),
            'portion' => 1,
            'location' => 'Bandung',
            'image' => 'dummy.jpg',
            'partner_id' => 1,
            'status' => 'available',
        ]);

        $response = $this->get('/donations');
        $response->assertStatus(200);
        $response->assertSee('Donasi List Test');
    }

    /** @test */
    public function ubah_donasi_berhasil()
    {
        $donation = \App\Models\Donation::create([
            'name' => 'Old Name',
            'description' => 'Old Desc',
            'category_id' => $this->category->id,
            'pickup_time' => Carbon::now()->addDays(1),
            'portion' => 1,
            'location' => 'Bandung',
            'image' => 'dummy.jpg',
            'partner_id' => 1,
            'status' => 'available',
        ]);

        $response = $this->put("/donations/{$donation->id}", [
            'name' => 'New Name',
            'description' => 'New Desc',
            'category_id' => $this->category->id,
            'pickup_time' => Carbon::now()->addDays(2),
            'portion' => 2,
            'location' => 'Jakarta',
            'partner_id' => 1,
        ]);

        $response->assertRedirect(route('donations.index'));
        $donation->refresh();
        $this->assertEquals('New Name', $donation->name);
        $this->assertEquals('Jakarta', $donation->location);
    }

    /** @test */
    public function hapus_donasi_berhasil()
    {
        $donation = \App\Models\Donation::create([
            'name' => 'Donasi Dihapus',
            'description' => 'Desc',
            'category_id' => $this->category->id,
            'pickup_time' => Carbon::now()->addDays(1),
            'portion' => 1,
            'location' => 'Bandung',
            'image' => 'dummy.jpg',
            'partner_id' => 1,
            'status' => 'available',
        ]);

        $response = $this->delete("/donations/{$donation->id}");
        $response->assertRedirect(route('donations.index'));
        $this->assertDatabaseMissing('donations', ['id' => $donation->id]);
    }

    /** @test */
    public function lihat_detail_makanan()
    {
        $donation = \App\Models\Donation::create([
            'name' => 'Donasi Detail',
            'description' => 'Deskripsi detail',
            'category_id' => $this->category->id,
            'pickup_time' => Carbon::now()->addDays(1),
            'portion' => 1,
            'location' => 'Bandung',
            'image' => 'dummy.jpg',
            'partner_id' => 1,
            'status' => 'available',
        ]);

        $response = $this->get("/donations/{$donation->id}");
        $response->assertStatus(200);
        $response->assertSee('Donasi Detail');
        $response->assertSee('Deskripsi detail');
    }
}
