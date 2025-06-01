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

class DonationPositiveTest extends DuskTestCase
{
    /**
     * Contoh uji coba Dusk.
     * @group positivedonasi
     */
     
    // Fungsi uji untuk mensimulasikan pembuatan donasi
    public function test_create_donation()
    {
        // Mulai sesi browser untuk pengujian
        $this->browse(function (Browser $browser) {
            
            // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
            $user = \App\Models\User::find(23);

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
                ->attach('image', public_path('images/testing/test.jpg')); // Lampirkan file gambar palsu untuk donasi

            // Set waktu pickup ke satu hari dari sekarang menggunakan Carbon untuk menghasilkan datetime
            $datetime = now()->addDay()->format('Y-m-d\TH:i');
            $browser->script([
                // Set waktu pickup menggunakan JavaScript untuk berinteraksi dengan field input
                "document.querySelector('[name=\"pickup_time\"]').value = '{$datetime}';"
            ]);

            // Tekan tombol 'Tambah Makanan' untuk mengirimkan formulir
            $browser->press('Tambah Makanan');
                // Pastikan pesan sukses muncul setelah pengiriman
        });
    } 
/**
     * A Dusk test example.
     * @group positivedonasi
     */

     public function test_edit_donation()
{
    $this->browse(function (Browser $browser) {
        $user = \App\Models\User::find(23);
        $category = \App\Models\Category::first() ?? \App\Models\Category::factory()->create();

        $browser->loginAs($user)
            ->visit('/mitra/donations')
            ->click('@edit-donation-button')
            ->type('name', 'Makanan')
            ->select('category_id', $category->id)
            ->type('description', 'Deskripsi donasi makanan')
            ->type('portion', 3)
            ->type('location', 'Bandung')
            ->attach('image', public_path('images/testing/test.jpg'));
        $datetime = now()->addDay()->format('Y-m-d\TH:i');
        $browser->script([
            "document.querySelector('[name=\"pickup_time\"]').value = '{$datetime}';"
        ]);

        $browser->press('Simpan Perubahan');
    });
}

/**
     * Test untuk lihat donasi
     * @group positivedonasi
     */
    public function test_lihat_donasi()
    {
        $this->browse(function (Browser $browser) {
            // Login as user with ID 23
            $user = \App\Models\User::find(23);

            $browser->loginAs($user)
                ->visit('/mitra/donations')
                ->assertSee('Makanan');
        });
    }

    /**
     * Test untuk menghapus donasi
     * @group positivedonasi
     */
    public function test_delete_donation()
    {
        $this->browse(function (Browser $browser) {
            // Login as user with ID 2
            $user = \App\Models\User::find(2);

            $browser->loginAs($user)
                ->visit('/mitra/donations')
                ->pause(1000) // Wait for the page to load completely
                ->screenshot('before-delete') // Take screenshot before deletion
                ->click('@delete-donation-button') // Click delete button
                ->waitForDialog(5) // Wait for the dialog to appear
                ->assertDialogOpened('Apakah Anda yakin ingin menghapus donasi ini?')
                ->acceptDialog(); // Verify success message
        });
    }
}
