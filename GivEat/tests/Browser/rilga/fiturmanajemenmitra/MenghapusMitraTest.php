<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenghapusMitraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group mitradelete
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(2); 

            $browser->loginAs($user)
                    ->visit('/admin/mitra')
                    ->assertPathIs('/admin/mitra')
                    ->press('Hapus')
                    ->assertDialogOpened('Apakah Anda yakin ingin menghapus mitra ini?')
                    ->acceptDialog()
                    ->pause(1000)
                    ->assertSee('Mitra berhasil dihapus.');
        });
    }
}
