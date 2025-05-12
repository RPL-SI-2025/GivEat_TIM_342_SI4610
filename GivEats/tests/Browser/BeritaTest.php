<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Validation\Rules\Email;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Berita;

class BeritaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */

     public function testLoginAdmin(): void
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/')
                     ->clickLink(link:"Log in")
                     ->type(field:"email", value:"admin@giveat.com")
                     ->type(field:"password", value:"admin12345")
                     ->press(button:"LOG IN");
         });
     }
    public function testTambahBerita(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/berita')
                    ->clickLink(link:"Tambah Berita")
                    ->type(field:"judul", value:"Ini Judul Untuk Testing Create Berita")
                    ->attach('gambar', __DIR__.'/test-images/test.jpg')
                    ->type(field:"ringkasan", value:"Ini Ringkasan Untuk Testing Create Berita")
                    ->type(field:"isi", value:"Ini Isi Berita Untuk Testing Create Berita")
                    ->press(button:"Tambah Berita")
                    ->pause(500)
                    ->assertSee('Berita berhasil ditambahkan'); ;
        });
    }

    public function testEditBerita(): void
    {
        $berita = Berita::factory()->create();
        $this->browse(function (Browser $browser) use ($berita) {
            $browser->visit('/admin/berita/'.$berita->id.'/edit')
                    ->type('judul', 'Judul Berita Diupdate')
                    ->type('isi', 'Isi berita yang sudah diupdate')
                    ->press('Update')
                    ->pause(500)
                    ->assertSee('Berita berhasil diperbarui'); ;
        });
    }

    public function testHapusBerita(): void
    {
        $berita = Berita::factory()->create(['judul' => 'Berita Untuk Dihapus']);
        $this->browse(function (Browser $browser) use ($berita) {
            $browser->visit('/admin/berita/')
                    ->click("@delete-berita-{$berita->id}")
                    ->acceptDialog()
                    ->assertSee('Berita berhasil dihapus'); ;
        });
    }

    public function testExceptionTambahBerita_JudulKosong(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/berita')
                    ->clickLink(link:"Tambah Berita")
                    ->attach('gambar', __DIR__.'/test-images/test.jpg')
                    ->type(field:"ringkasan", value:"Ini Ringkasan Untuk Testing Create Berita")
                    ->type(field:"isi", value:"Ini Isi Berita Untuk Testing Create Berita")
                    ->press(button:"Tambah Berita")
                    ->assertPathIs('/admin/berita/create');
        });
    }

    public function testExceptionTambahBerita_SemuaKosong(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/berita')
                    ->clickLink(link:"Tambah Berita")
                    ->press(button:"Tambah Berita")
                    ->assertPathIs('/admin/berita/create');
        });
    }
    public function testExceptionEditBerita_SemuaKolomKosong(): void
    {
        $berita = Berita::factory()->create();
        $this->browse(function (Browser $browser) use ($berita) {
            $browser->visit('/admin/berita/'.$berita->id.'/edit')
                    ->type('judul', '')
                    ->type('ringkasan', '')
                    ->type('isi', '')
                    ->press('Update')
                    ->assertPathIs('/admin/berita/'.$berita->id.'/edit');
        });
    }

    public function testlogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/berita')
                    ->click('button[data-bs-toggle="dropdown"]')
                    ->press('Logout');
        });
    }
    public function testLoginUser(): void
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/')
                     ->clickLink(link:"Log in")
                     ->type(field:"email", value:"user@giveat.com")
                     ->type(field:"password", value:"user12345")
                     ->press(button:"LOG IN");
         });
     }
     
     public function testLihatDaftarBerita(): void
     {
        $berita = Berita::factory()->create(['judul' => 'Judul Berita Spesifik']);
        $this->browse(function (Browser $browser) use ($berita) {
             $browser->visit('/berita')
                     ->assertSee($berita->judul);
         });
     }
     public function testBacaDetailBerita()
    {
        $berita = Berita::factory()->create([
            'judul' => 'Berita Detail Diuji',
            'isi' => 'Ini isi detail berita untuk pengujian.'
        ]);

        $this->browse(function (Browser $browser) use ($berita) {
            $browser->visit('/berita')
                    ->clickLink(link:"Baca selengkapnya")
                    ->assertPathIs('/berita/' . $berita->id)
                    ->assertSee($berita->judul)
                    ->assertSee($berita->isi);
        });
    }
}
