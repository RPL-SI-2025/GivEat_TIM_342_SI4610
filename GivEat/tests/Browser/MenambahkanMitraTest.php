<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenambahkanMitraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group tambahmitra
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(3); 

            $browser->loginAs($user)
                    ->visit('/admin/mitra') // visit halaman mitra
                    ->assertPathIs('/admin/mitra') // assert path url adalah /admin/mitra
                    ->clickLink('Tambah Mitra') // click link Tambah Mitra
                    ->assertPathIs('/admin/mitra/create') // assert path url adalah /admin/mitra/create
                    ->type('name', 'mitra2')
                    ->type('email', 'mitra2@giveat.com') 
                    ->type('password', 'mitra12345') 
                    ->type('password_confirmation', 'mitra12345;')
                    ->press('Simpan Mitra'); // press button Simpan Mitra
        });
    }
}
