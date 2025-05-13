<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MengeditMitraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group mengeditmitra
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(3); 

            $browser->loginAs($user)
                    ->visit('/admin/mitra') // visit halaman mitra
                    ->assertPathIs('/admin/mitra') // assert path url adalah /admin/mitra
                    ->clickLink('Edit') // click link Tambah Mitra
                    ->assertPathIs('/admin/mitra/2/edit') // assert path url adalah /admin/mitra/create
                    ->type('name', 'mitra2')
                    ->type('email', 'mitra2@giveat.com') 
                    ->type('password', 'mitra12345') 
                    ->type('password_confirmation', 'mitra12345;')
                    ->press('Update Mitra'); // press button Simpan Mitra
        });
    }
}
