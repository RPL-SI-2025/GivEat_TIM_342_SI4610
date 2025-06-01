<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GagalUpdatemitra2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group mitragagalupdate2
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
                    ->type('email', 'mitra2@gmail.com')
                    ->type('password', 'mitra123456')
                    ->type('password_confirmation', 'mitra12345')
                    ->press('Update Mitra')
                    ->pause(1000)
                    ->screenshot('mitra-gagal-update2');
        });
    }
}
