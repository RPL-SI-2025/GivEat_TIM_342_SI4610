<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GagalUpdatemitra1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group mitragagalupdate1
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(2); 

            $browser->loginAs($user)
                    ->visit('/admin/mitra')
                    ->assertPathIs('/admin/mitra')
                    ->clickLink('Edit')
                    ->assertPathIs('/admin/mitra/23/edit')
                    ->type('name', 'mitra2')
                    ->type('email', 'mitra2')
                    ->type('password', 'mitra12345')
                    ->type('password_confirmation', 'mitra12345')
                    ->press('Update Mitra')
                    ->pause(1000)
                    ->screenshot('mitra-gagal-update1');
        });
    }
}
