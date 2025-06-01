<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginMitraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group loginmitra
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'Mitra@giveat.com')
                    ->type('password', 'mitra12345')
                    ->press('Masuk')
                    ->assertPathIs('/mitra/dashboard');
        });
    }
}
