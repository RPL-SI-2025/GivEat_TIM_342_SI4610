<?php

namespace Tests\Browser\NegativeTest_Donations;

use App\Models\User;
use App\Models\Category;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class DonationNegativeTest extends DuskTestCase
{
    /**
     * Test case 1: Gagal Tambah - Nama Kosong
     * @group negative-donations
     */
    public function test_fail_create_donation_empty_name()
    {
        // Menjalankan test dalam browser menggunakan Laravel Dusk
        $this->browse(function (Browser $browser) {
            $user = User::find(2); // Menemukan pengguna dengan ID 2
            $category = Category::first() ?? Category::factory()->create(); // Mengambil kategori pertama, atau membuat kategori baru jika kosong

            // Melakukan login dan mengunjungi halaman untuk membuat donasi
            $browser->loginAs($user)
                ->visit('/mitra/donations/create') // Mengunjungi halaman untuk membuat donasi
                ->type('description', 'Deskripsi donasi makanan') // Mengisi deskripsi donasi
                ->select('category_id', $category->id) // Memilih kategori donasi
                ->type('portion', '3') // Menentukan jumlah porsi donasi
                ->type('location', 'Bandung') // Menentukan lokasi donasi
                ->type('pickup_time', now()->addDay()->format('Y-m-d\TH:i')) // Menentukan waktu pengambilan donasi
                ->press('Tambah Makanan'); // Menekan tombol untuk menambah donasi
        });
    }

    /**
     * Test case 2: Gagal Tambah - Kategori Tidak Dipilih
     * @group negative-donations
     */
    public function test_fail_create_donation_empty_category()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(2); // Menemukan pengguna dengan ID 2

            // Melakukan login dan mengunjungi halaman untuk membuat donasi
            $browser->loginAs($user)
                ->visit('/mitra/donations/create') // Mengunjungi halaman untuk membuat donasi
                ->type('name', 'Donasi Makanan') // Mengisi nama donasi
                ->type('description', 'Deskripsi donasi makanan') // Mengisi deskripsi donasi
                ->type('portion', '3') // Menentukan jumlah porsi donasi
                ->type('location', 'Bandung') // Menentukan lokasi donasi
                ->type('pickup_time', now()->addDay()->format('Y-m-d\TH:i')) // Menentukan waktu pengambilan donasi
                ->press('Tambah Makanan'); // Menekan tombol untuk menambah donasi
        });
    }

    /**
     * Test case 3: Gagal Upload - Gambar Tidak Sesuai
     * @group negative-donations
     */
    public function test_fail_create_donation_invalid_image()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(2); // Menemukan pengguna dengan ID 2
            $category = Category::first() ?? Category::factory()->create(); // Mengambil kategori pertama, atau membuat kategori baru jika kosong
    
            // Membuat file teks palsu untuk pengujian
            $filePath = storage_path('framework/testing/disks/public/test.txt'); // Menentukan path file
            file_put_contents($filePath, 'This is a test file'); // Membuat file teks dengan konten pengujian
    
            // Melakukan login dan mengunjungi halaman untuk membuat donasi
            $browser->loginAs($user)
                ->visit('/mitra/donations/create') // Mengunjungi halaman untuk membuat donasi
                ->type('name', 'Donasi Makanan') // Mengisi nama donasi
                ->select('category_id', $category->id) // Memilih kategori donasi
                ->type('description', 'Deskripsi donasi makanan') // Mengisi deskripsi donasi
                ->type('portion', '3') // Menentukan jumlah porsi donasi
                ->type('location', 'Bandung'); // Menentukan lokasi donasi
    
            // Mengatur waktu pengambilan donasi sebelum form disubmit
            $datetime = now()->addDay()->format('Y-m-d\TH:i');
            $browser->script([
                "document.querySelector('[name=\"pickup_time\"]').value = '{$datetime}';" // Menentukan waktu pengambilan
            ]);
    
            // Mengunggah file teks dan menekan tombol untuk menambah donasi
            $browser->attach('image', $filePath) // Mengunggah file gambar (yang bukan gambar)
                ->press('Tambah Makanan') // Menekan tombol untuk menambah donasi
                ->assertSee('The image field must be an image.'); // Memastikan pesan error tampil karena file yang diunggah bukan gambar
    
            // Menghapus file setelah pengujian selesai
            if (file_exists($filePath)) {
                unlink($filePath); // Menghapus file yang digunakan untuk pengujian
            }
        });
    }
    
    /**
     * Test case 4: Gagal Edit - Donasi Sudah Diklaim
     * @group negative-donations
     */
    public function test_fail_edit_donation_claimed()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(2); // Menemukan pengguna dengan ID 2
            $browser->loginAs($user)
                ->visit('/mitra/donations') // Mengunjungi halaman daftar donasi
                ->waitFor('tbody tr') // Menunggu tabel termuat
                ->pause(500); // Menunggu sedikit jika data dimuat via JS
        
            // Mengambil semua baris dari tabel
            $rows = $browser->elements('tbody tr');
        
            // Mencari baris yang berisi status '0' (donasi yang sudah diklaim)
            foreach ($rows as $index => $row) {
                if (str_contains($row->getText(), '0')) { // Memeriksa jika statusnya '0'
                    $browser->with("tbody tr:nth-child(" . ($index + 1) . ")", function ($rowBrowser) {
                        $rowBrowser->click('@edit-donation-button'); // Mengklik tombol edit pada baris yang ditemukan
                    });
        
                    // Memastikan dialog error muncul
                    $browser
                        ->assertSee('Donasi yang sudah diklaim tidak dapat diubah'); // Memastikan pesan yang sesuai muncul
                    break; // Menghentikan iterasi setelah menemukan dan memeriksa baris
                }
            }
        });
    }
    
    /**
     * Test case 5: Gagal Hapus - Donasi Sudah Diklaim
     * @group negative-donations
     */
    public function test_fail_delete_claimed_donation()
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(2); // Menemukan pengguna dengan ID 2
            $browser->loginAs($user)
                ->visit('/mitra/donations') // Mengunjungi halaman daftar donasi
                ->waitFor('tbody tr') // Menunggu tabel termuat
                ->pause(500); // Menunggu sedikit jika data dimuat via JS
        
            // Mengambil semua baris dari tabel
            $rows = $browser->elements('tbody tr');
        
            // Mencari baris yang berisi status '0' (donasi yang sudah diklaim)
            foreach ($rows as $index => $row) {
                if (str_contains($row->getText(), '0')) { // Memeriksa jika statusnya '0'
                    // Mengklik tombol hapus pada baris yang ditemukan
                    $browser->with("tbody tr:nth-child(" . ($index + 1) . ")", function ($rowBrowser) {
                        $rowBrowser->click('@delete-donation-button'); // Mengklik tombol hapus
                    });
        
                    // Menunggu dialog konfirmasi muncul dan menerima dialog
                    $browser->waitForDialog(5) // Menunggu dialog muncul
                        ->acceptDialog() // Menerima dialog
                        ->assertSee('Donasi tidak bisa dihapus karena sudah diklaim oleh penerima'); // Memastikan pesan error yang sesuai muncul
                    break; // Menghentikan iterasi setelah menemukan dan memeriksa baris
                }
            }
        });
    }
}
