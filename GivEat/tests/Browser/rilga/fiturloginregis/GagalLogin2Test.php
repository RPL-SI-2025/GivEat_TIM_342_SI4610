<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GagalLogin2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logingagal2
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'User@giveat.com')
                    ->type('password', 'user123456')
                    ->press('Masuk')
                    ->pause(1000)
                    ->screenshot('login-gagal-2');
        });
    }
}
