<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MengeditMitraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group mitraedit
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(2); 

            $browser->loginAs($user)
                    ->visit('/admin/mitra')
                    ->assertPathIs('/admin/mitra')
                    ->clickLink('Edit')
                    ->assertPathIs('/admin/mitra/3/edit') 
                    ->type('name', 'Mitra')
                    ->type('email', 'Mitra@giveat.com') 
                    ->type('password', 'mitra12345') 
                    ->type('password_confirmation', 'mitra12345')
                    ->press('Update Mitra')
                    ->assertSee('Data mitra berhasil diperbarui.');
        });
    }
}
