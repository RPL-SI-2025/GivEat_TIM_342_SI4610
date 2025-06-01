<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenampilkanMitraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group mitrashow
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(2); 

            $browser->loginAs($user)
                    ->visit('/admin/mitra')
                    ->assertPathIs('/admin/mitra')
                    ->assertSee('Daftar Mitra');
        });
    }
}
