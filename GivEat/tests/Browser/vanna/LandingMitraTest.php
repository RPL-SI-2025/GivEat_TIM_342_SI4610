<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LandingMitraTest extends DuskTestCase
{
    /**
     * Normal Case Test
     */
    public function testLandingPageAndMitraRegistration(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Beranda')
                    ->assertSee('Mitra')
                    ->clickLink('Mitra')
                    ->assertPathIs('/mitra')
                    ->assertSee('Mulai Sekarang!')
                    ->clickLink('Mulai Sekarang!')
                    ->assertPathIs('/mitra#join_mitra')
                    ->type('Nama', 'Test Mitra')
                    ->type('Email', 'mitra@example.com')
                    ->type('Nomor_HP', '081234567890')
                    ->type('Pesan', 'Saya ingin bergabung sebagai mitra')
                    ->press('Kirim')
                    ->assertSee('Terima kasih'); 
        });
    }

    /**
     * Exception Case Test
     */
    public function testMitraFormValidation(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/mitra')
                    ->clickLink('Mulai Sekarang!')
                    ->assertPathIs('/mitra#join_mitra')
                    ->type('Nama', 'Hanya Nama')
                    ->press('Kirim')
                    ->assertSee('Please fill out this field.');
        });
    }
}
