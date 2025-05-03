<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class KlaimMakananTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/donations/1')
                    ->assertSee('Sop Ayam dan Sayur')
                    ->press('Ambil Makananmu')
                    ->assertPathIs('/claim/success/default-slug')
                    ->press('Kembali ke Beranda')
                    ->press('Batalkan Pemesanan')
                    ->click('a[href^="https://maps.app.goo.gl"]');
                    
        });
    }
}
