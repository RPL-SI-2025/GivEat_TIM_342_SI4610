<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GagalLogin1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logingagal1
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'User@yahoo.com')
                    ->type('password', 'user12345')
                    ->press('Masuk')
                    ->pause(1000)
                    ->screenshot('login-gagal-1');
        });
    }
}
