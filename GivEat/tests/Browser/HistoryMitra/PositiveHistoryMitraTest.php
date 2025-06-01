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

class PositiveHistoryMitraTest extends DuskTestCase
{
    /**
     * Contoh uji coba Dusk.
     * @group positivehistorymitra
     */
     
    // Fungsi uji untuk mensimulasikan pembuatan donasi
    public function test_history_mitra()
    {
        // Mulai sesi browser untuk pengujian
        $this->browse(function (Browser $browser) {
            
            // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
            $user = \App\Models\User::find(2);
            // Login pengguna dan kunjungi halaman history
            $browser->loginAs($user)
            ->visit('/mitra/history') // Ganti dengan URL yang sesuai
            ->assertSee('Riwayat Donasi') // Verifikasi halaman Riwayat muncul
            ->assertSee('Pesanan') // Verifikasi header tabel ada
            ->assertSee('Nama') // Verifikasi header tabel ada
            ->assertSee('Waktu Booking') // Verifikasi header tabel ada
            ->assertSee('Tanggal') // Verifikasi header tabel ada
            ->assertSee('Status') // Verifikasi header tabel ada
            ->assertSee('Action'); // Verifikasi header tabel ada
    });
    }
/**
     * Contoh uji coba Dusk.
     * @group positivehistorymitra
     */
    public function testFilterPesananSelesai()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/mitra/history') // Ganti dengan URL yang sesuai
            ->click('@filter-selesai') // Ganti dengan selector yang sesuai
            ->assertSee('Selesai'); // Verifikasi status "Selesai" ditampilkan
    });
}
/**
     * Contoh uji coba Dusk.
     * @group positivehistorymitra
     */
    public function testFilterPesananBelumDiambil()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/mitra/history') // Ganti dengan URL yang sesuai
            ->click('@filter-belum-diambil') // Ganti dengan selector yang sesuai
            ->assertSee('Belum Diambil'); // Verifikasi status "Belum Diambil" ditampilkan
    });
}
/**
     * Contoh uji coba Dusk.
     * @group positivehistorymitra
     */
    public function testFilterPesananTidakDiambil()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/mitra/history') // Ganti dengan URL yang sesuai
            ->click('@filter-tidak-diambil') // Ganti dengan selector yang sesuai
            ->assertSee('Tidak Diambil'); // Verifikasi status "Tidak Diambil" ditampilkan
    });
}
/**
     * Contoh uji coba Dusk.
     * @group positivehistorymitra
     */
public function testExportPDFSemuaData()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/mitra/history')
            ->click('@export-pdf-button')
            ->pause(2000); // Beri waktu untuk proses export
    });
}
/**
     * Contoh uji coba Dusk.
     * @group positivehistorymitra
     */
public function testPaginationBerfungsi()
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/mitra/history') // Ganti dengan URL yang sesuai
            ->click('@next-page-link') // Ganti dengan selector pagination untuk halaman 2
            ->assertSee('Pesanan'); // Verifikasi data pada halaman kedua muncul
    });
}

}
