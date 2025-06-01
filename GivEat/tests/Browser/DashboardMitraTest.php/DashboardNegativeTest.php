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

class DashboardNegativeTest extends DuskTestCase
{
    /**
     * Contoh uji coba Dusk.
     * @group negativedashboardmitra
     */
    public function test_daftar_pesanan()
    {
        // Mulai sesi browser untuk pengujian
        $this->browse(function (Browser $browser) {
            
            // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
            $user = \App\Models\User::find(2);
            // Login pengguna dan kunjungi halaman history
            $browser->loginAs($user)
            ->visit('/mitra/dashboard') // Ganti dengan URL yang sesuai
            ->assertSee('Tidak ada data pesanan.'); // Verifikasi daftar pesanan muncul
    });
    }

        /**
     * Contoh uji coba Dusk.
     * @group negativedashboardmitra
     */
    // Mulai sesi browser untuk pengujian
    public function test_daftar_donasi()
    {
    $this->browse(function (Browser $browser) {
            
        // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
        $user = \App\Models\User::find(2);
        // Login pengguna dan kunjungi halaman history
        $browser->loginAs($user)
        ->visit('/mitra/dashboard') // Ganti dengan URL yang sesuai
        ->assertSee('Tidak ada donasi tersedia saat ini'); // Verifikasi daftar pesanan muncul
});
}
}
