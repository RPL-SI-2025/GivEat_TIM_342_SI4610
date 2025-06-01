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

class DashboardPositiveTest extends DuskTestCase
{
    /**
     * Contoh uji coba Dusk.
     * @group positivedashboardmitra
     */
    public function test_statistik()
    {
        // Mulai sesi browser untuk pengujian
        $this->browse(function (Browser $browser) {
            
            // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
            $user = \App\Models\User::find(2);
            // Login pengguna dan kunjungi halaman history
            $browser->loginAs($user)
            ->visit('/mitra/dashboard')
            ->assertSee('Dashboard') // Make sure 'Dashboard' is present
            ->assertSee('Total Pesanan') // Make sure "Total Pesanan" is present
            ->assertSee('Penerima Makanan') // Make sure "Penerima Makanan" is present
            ->assertSee('Kg Makanan Terselamatkan'); // Make sure "Kg Makanan Terselamatkan" is present
        });
    }
/**
     * Contoh uji coba Dusk.
     * @group positivedashboardmitra
     */
    public function test_daftar_pesanan()
    {
        // Mulai sesi browser untuk pengujian
        $this->browse(function (Browser $browser) {
            
            // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
            $user = \App\Models\User::find(2);
            // Login pengguna dan kunjungi halaman history
            $browser->loginAs($user)
            ->visit('/mitra/dashboard')
            ->assertSee('No') // Ensure it is visible
            ->assertSee('Pesanan') // Ensure the user's  booking code is visible
            ->assertSee('Nama') // Ensure the claimed name is visible
            ->assertSee('Waktu') // Ensure the claimed date is visible
            ->assertSee('Tanggal'); // Ensure the claimed date is visible
        });
    }

    /**
     * Contoh uji coba Dusk.
     * @group positivedashboardmitra
     */
    public function test_status_pesanan()
    {
        // Mulai sesi browser untuk pengujian
        $this->browse(function (Browser $browser) {
            
            // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
            $user = \App\Models\User::find(2);
            // Login pengguna dan kunjungi halaman history
            $browser->loginAs($user)
            ->visit('/mitra/dashboard')
            ->assertSee('Selesai') // Ensure done status is visible
            ->assertSee('Belum Diambil') // Ensure not yet picked is visible
            ->assertSee('Tidak Diambil'); // Ensure not picked is visible
        });
    }
    /**
     * Contoh uji coba Dusk.
     * @group positivedashboardmitra
     */
    public function test_daftar_donasi()
    {
        // Mulai sesi browser untuk pengujian
        $this->browse(function (Browser $browser) {
            
            // Ambil pengguna (diasumsikan pengguna dengan ID 2 ada) untuk login
            $user = \App\Models\User::find(2);
            // Login pengguna dan kunjungi halaman history
            $browser->loginAs($user)
            ->visit('/mitra/dashboard')
            ->assertSee('Makanan'); // Ensure "Makanan" is visible
        });
    }
}
