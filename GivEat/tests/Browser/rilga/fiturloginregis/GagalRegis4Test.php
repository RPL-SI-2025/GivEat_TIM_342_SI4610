<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GagalRegis4Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group regisgagal4
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Daftar')
                    ->assertPathIs('/register')
                    ->type('name', 'User')
                    ->type('email', 'user3@gmail.com')
                    ->type('password', 'user12345')
                    ->type('password_confirmation', 'user12345')
                    ->press('Daftar')
                    ->pause(1000)
                    ->screenshot('regis-gagal-4');
        });
    }
}
