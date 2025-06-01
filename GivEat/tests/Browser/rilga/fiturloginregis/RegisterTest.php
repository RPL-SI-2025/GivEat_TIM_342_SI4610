<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
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
                    ->assertSee('Top Restaurant');
        });
    }
}
