<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenghapusMitraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group menghapusmitra
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(3); 

            $browser->loginAs($user)
                    ->visit('/admin/mitra') // visit halaman mitra
                    ->assertPathIs('/admin/mitra') // assert path url adalah /admin/mitra
                    ->press('Hapus'); // press button Hapus
        });
    }
}
