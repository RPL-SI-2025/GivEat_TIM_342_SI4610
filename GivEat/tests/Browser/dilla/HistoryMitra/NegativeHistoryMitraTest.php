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

class NegativeHistoryMitraTest extends DuskTestCase
{
    /**
     * Contoh uji coba Dusk.
     * @group negativehistorymitra
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
            ->assertSee('Tidak ada data riwayat donasi.'); // Verifikasi halaman Riwayat muncul
    });
    }
/**
     * Contoh uji coba Dusk.
     * @group negativehistorymitra
     */
     
    // Fungsi uji untuk mensimulasikan pembuatan donasi
    public function test_filter_semua()
    {
        // Mulai sesi browser untuk pengujian
        $this->browse(function (Browser $browser) {
            
            // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
            $user = \App\Models\User::find(2);
            // Login pengguna dan kunjungi halaman history
            $browser->loginAs($user)
            ->visit('/mitra/history')
            ->click('@filter-selesai') // Ganti dengan URL yang sesuai
            ->assertSee('Tidak ada data riwayat donasi.'); // Verifikasi halaman Riwayat muncul
    });
    }
}
