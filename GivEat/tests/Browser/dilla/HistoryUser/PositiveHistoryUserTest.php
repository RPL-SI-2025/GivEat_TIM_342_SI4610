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

class PositiveHistoryUserTest extends DuskTestCase
{
    /**
     * Contoh uji coba Dusk.
     * @group positivehistoryuser
     */
     
    // Fungsi uji untuk mensimulasikan pembuatan donasi
    public function test_history_user()
    {
        // Mulai sesi browser untuk pengujian
        $this->browse(function (Browser $browser) {
            
            // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
            $user = \App\Models\User::find(3);
            // Login pengguna dan kunjungi halaman history
            $browser->loginAs($user)
            ->visit('/claim-history') // Ganti dengan URL yang sesuai
            ->assertSee('Riwayat Klaim Makanan') // Verifikasi halaman Riwayat muncul
            ->assertSee('MAKANAN') // Verifikasi header tabel ada
            ->assertSee('RESTORAN') // Verifikasi header tabel ada
            ->assertSee('KODE PEMESANAN') // Verifikasi header tabel ada
            ->assertSee('TANGGAL KLAIM') // Verifikasi header tabel ada
            ->assertSee('AKSI'); // Verifikasi header tabel ada
    });
    }
/**
     * Contoh uji coba Dusk.
     * @group positivehistoryuser
     */
    public function testExportPDF()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/claim-history')
            ->click('@print-pdf-button')
            ->pause(2000); // Beri waktu untuk proses export
    });
}

/**
     * Contoh uji coba Dusk.
     * @group positivehistoryuser
     */
    public function testPaginationBerfungsi()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/claim-history') // Ganti dengan URL yang sesuai
                ->click('@next-page-link') // Ganti dengan selector pagination untuk halaman 2
                ->assertSee('MAKANAN'); // Verifikasi data pada halaman kedua muncul
        });
    }
}
