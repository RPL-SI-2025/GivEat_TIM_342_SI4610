<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DonasiLocationTest extends DuskTestCase
{
    /**
     * @test
     */
    public function user_can_login_ambil_donasi_and_see_location()
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(4); // Sesuaikan ID user valid di database

            $browser->loginAs($user)
                    ->visit('/dashboard')
                    ->assertSee('Siap Makan Hari Ini')
                    ->pause(1000)

                    // Klik tombol Ambil berdasarkan attribute dusk
                    ->waitFor('@order', 5)
                    ->click('@order')
                    ->pause(1000)

                    // Validasi nama makanan di halaman detail
                    ->assertSee('Sate Maranggi')

                    // Klik tombol/link buka Google Maps
                    ->waitFor('@open-maps', 5)
                    ->click('@open-maps')
                    ->pause(2000);
        });
    }
}
