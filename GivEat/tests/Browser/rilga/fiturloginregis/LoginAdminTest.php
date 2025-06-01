<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginAdminTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group loginadmin
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Masuk')
                    ->assertPathIs('/login')
                    ->type('email', 'Admin@giveat.com')
                    ->type('password', 'admin12345')
                    ->press('Masuk')
                    ->assertPathIs('/admin/dashboard');
        });
    }
}
