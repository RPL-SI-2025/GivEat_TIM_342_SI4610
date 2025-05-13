<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // visit page home
                    ->clickLink('Log in') // click link login
                    ->assertPathIs('/login') // assert path url adalah /login
                    ->type('email', 'User@gmail.com') // type email
                    ->type('password', 'user12345') // type password
                    ->press('LOG IN'); // press button Login
        });
    }
}
