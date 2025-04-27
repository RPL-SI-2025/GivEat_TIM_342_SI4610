<?php

namespace Tests\Feature;

use App\Models\Berita;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BeritaFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function halaman_index_berita_dapat_diakses()
    {
        $response = $this->get(route('berita.index'));
        $response->assertStatus(200);
    }

    public function dapat_menampilkan_berita_terbaru_dan_lainnya()
    {
        $berita1 = Berita::factory()->create(['created_at' => now()->subDay()]);
        $berita2 = Berita::factory()->create(['created_at' => now()]);

        $response = $this->get(route('berita.index'));
        $response->assertSee($berita2->judul); 
        $response->assertSee($berita1->judul);
    }

    public function dapat_melihat_detail_berita()
    {
        $berita = Berita::factory()->create();

        $response = $this->get(route('berita.show', $berita->id));
        $response->assertStatus(200);
        $response->assertSee($berita->judul);
    }

    public function dapat_menambah_berita()
    {
        Storage::fake('images');

        $fileGambar = UploadedFile::fake()->image('gambar.jpg');

        $response = $this->post(route('admin.berita.store'), [
            'judul' => 'Judul Berita',
            'gambar' => $fileGambar,
            'ringkasan' => 'Ringkasan berita',
            'isi' => 'Isi lengkap berita',
        ]);

        $response->assertRedirect(route('admin.berita.index'));
        $this->assertDatabaseHas('beritas', ['judul' => 'Judul Berita']);
    }

    public function validasi_gagal_jika_data_tidak_lengkap()
    {
        $response = $this->post(route('admin.berita.store'), [
            'judul' => '',
            'ringkasan' => '',
            'isi' => '',
        ]);

        $response->assertSessionHasErrors(['judul', 'gambar', 'ringkasan', 'isi']);
    }

    public function test_dapat_memperbarui_berita(): void
    {
        Storage::fake('public');

        $berita = Berita::factory()->create([
            'judul' => 'Judul Lama',
            'ringkasan' => 'Ringkasan Lama',
            'isi' => 'Isi Lama',
        ]);

        $response = $this->put(route('admin.berita.update', $berita->id), [
            'judul' => 'Judul Baru',
            'ringkasan' => 'Ringkasan Baru',
            'isi' => 'Isi Baru',
        ]);

        $response->assertRedirect(route('admin.berita.index'));

        $this->assertDatabaseHas('beritas', [
            'id' => $berita->id,
            'judul' => 'Judul Baru',
            'ringkasan' => 'Ringkasan Baru',
            'isi' => 'Isi Baru',
        ]);
    }

    public function dapat_menghapus_berita()
    {
        $berita = Berita::factory()->create();

        $response = $this->delete(route('admin.berita.destroy', $berita->id));

        $response->assertRedirect(route('admin.berita.index'));
        $this->assertDatabaseMissing('beritas', ['id' => $berita->id]);
    }
}
