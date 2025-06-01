<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LocationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group locationtest
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::find(18); // Ganti dengan ID user kamu yang valid

            $browser->loginAs($user)
                ->refresh()
                ->visit('/dashboard') // Pastikan ini route dashboard user
                ->pause(1000) // Tunggu tombol 'Ambil' muncul
                ->clicklink('Ambil'); // Klik tombol Ambil
        });
    }
}