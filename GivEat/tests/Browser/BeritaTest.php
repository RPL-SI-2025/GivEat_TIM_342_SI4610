<?php

namespace Tests\Browser;

use App\Models\Berita;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BeritaTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_admin_dapat_melihat_daftar_berita()
    {
        Berita::factory()->count(2)->create();

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/berita')
                ->assertSee('Daftar Berita');
        });
    }

    public function test_admin_dapat_menambahkan_berita()
    {
        Storage::fake('public');

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/berita/create')
                ->type('judul', 'Berita Dusk')
                ->attach('gambar', __DIR__.'/files/contoh.jpg')
                ->type('ringkasan', 'Ini ringkasan berita untuk test dusk.')
                ->type('isi', 'Isi lengkap dari berita untuk test dusk.')
                ->press('Simpan')
                ->assertPathIs('/admin/berita')
                ->assertSee('Berita berhasil ditambahkan');
        });
    }

    public function test_admin_dapat_memperbarui_berita()
    {
        $berita = Berita::factory()->create([
            'judul' => 'Judul Lama',
            'ringkasan' => 'Ringkasan Lama',
            'isi' => 'Isi Lama',
        ]);

        $this->browse(function (Browser $browser) use ($berita) {
            $browser->visit("/admin/berita/{$berita->id}/edit")
                ->type('judul', 'Judul Diperbarui')
                ->type('ringkasan', 'Ringkasan Diperbarui')
                ->type('isi', 'Isi Diperbarui')
                ->press('Simpan')
                ->assertPathIs('/admin/berita')
                ->assertSee('Berita berhasil diperbarui');
        });
    }

    public function test_admin_dapat_menghapus_berita()
    {
        $berita = Berita::factory()->create();

        $this->browse(function (Browser $browser) use ($berita) {
            $browser->visit('/admin/berita')
                ->press('@hapus-berita-' . $berita->id)
                ->whenAvailable('.swal2-confirm', function ($modal) {
                    $modal->click();
                })
                ->pause(1000)
                ->assertDontSee($berita->judul);
        });
    }

    public function test_validasi_input_kosong_saat_tambah_berita()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/berita/create')
                ->press('Simpan')
                ->assertSee('judul field is required')
                ->assertSee('gambar field is required')
                ->assertSee('ringkasan field is required')
                ->assertSee('isi field is required');
        });
    }
}
