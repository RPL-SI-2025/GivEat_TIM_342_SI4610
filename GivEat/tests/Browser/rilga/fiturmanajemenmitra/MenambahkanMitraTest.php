<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenambahkanMitraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group mitracreate
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(2); 

            $browser->loginAs($user)
                    ->visit('/admin/mitra')
                    ->assertPathIs('/admin/mitra')
                    ->clickLink('Tambah Mitra')
                    ->assertPathIs('/admin/mitra/create')
                    ->type('name', 'mitra2')
                    ->type('email', 'mitra2@giveat.com') 
                    ->type('password', 'mitra12345') 
                    ->type('password_confirmation', 'mitra12345')
                    ->press('Simpan Mitra')
                    ->assertSee('Mitra berhasil ditambahkan.');
        });
    }
}
