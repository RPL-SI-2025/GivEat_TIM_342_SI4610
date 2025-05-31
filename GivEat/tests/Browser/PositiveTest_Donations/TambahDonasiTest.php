<?php

namespace Tests\Browser;

use App\Models\Category;
use App\Models\Donation;
use App\Models\Partner;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Carbon\Carbon;

class TambahDonasiTest extends DuskTestCase
{
    /**
     * Contoh uji coba Dusk.
     * @group tambahdonasi
     */
     
    // Fungsi uji untuk mensimulasikan pembuatan donasi
    public function test_create_donation()
    {
        // Mulai sesi browser untuk pengujian
        $this->browse(function (Browser $browser) {
            
            // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
            $user = \App\Models\User::find(2);

            // Ambil kategori pertama atau buat kategori baru jika tidak ada
            $category = \App\Models\Category::first() ?? \App\Models\Category::factory()->create();

            // Login pengguna dan kunjungi halaman donasi
            $browser->loginAs($user)
                ->visit('/mitra/donations') // Navigasi ke halaman donasi
                ->clickLink('Tambah Donasi') // Klik link untuk menambah donasi baru
                ->type('name', 'Donasi Makanan') // Isi field 'name' dengan 'Donasi Makanan'
                ->select('category_id', $category->id) // Pilih kategori untuk donasi
                ->type('description', 'Deskripsi donasi makanan') // Isi field 'description' dengan deskripsi donasi
                ->type('portion', 3) // Isi field 'portion' dengan jumlah 3
                ->type('location', 'Bandung') // Isi field lokasi dengan 'Bandung'
                ->attach('image', UploadedFile::fake()->image('donasi.jpg')); // Lampirkan file gambar palsu untuk donasi

            // Set waktu pickup ke satu hari dari sekarang menggunakan Carbon untuk menghasilkan datetime
            $datetime = now()->addDay()->format('Y-m-d\TH:i');
            $browser->script([
                // Set waktu pickup menggunakan JavaScript untuk berinteraksi dengan field input
                "document.querySelector('[name=\"pickup_time\"]').value = '{$datetime}';"
            ]);

            // Tekan tombol 'Tambah Makanan' untuk mengirimkan formulir
            $browser->press('Tambah Makanan')
                // Pastikan pesan sukses muncul setelah pengiriman
                ->assertSee('Donasi berhasil ditambahkan');
        });
    }
}
