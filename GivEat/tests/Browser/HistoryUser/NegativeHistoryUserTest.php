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

class NegativeHistoryUserTest extends DuskTestCase
{
    /**
     * Contoh uji coba Dusk.
     * @group negativehistoryuser
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
            ->assertSee('Belum ada riwayat klaim'); // Verifikasi halaman Riwayat muncul
    });
    }
}
