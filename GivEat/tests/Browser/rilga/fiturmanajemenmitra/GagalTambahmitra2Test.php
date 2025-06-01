<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GagalTambahmitra2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group mitragagaltambah2
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
                    ->type('email', '')
                    ->type('password', 'mitra12345')
                    ->type('password_confirmation', 'mitra12345')
                    ->press('Simpan Mitra')
                    ->pause(1000)
                    ->screenshot('mitra-gagal-tambah2');
        });
    }
}
