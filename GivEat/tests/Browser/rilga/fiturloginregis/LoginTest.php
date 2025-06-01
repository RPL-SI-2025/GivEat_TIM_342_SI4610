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
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'User@giveat.com')
                    ->type('password', 'user12345')
                    ->press('Masuk')
                    ->assertSee('Top Restaurant');
        });
    }
}
