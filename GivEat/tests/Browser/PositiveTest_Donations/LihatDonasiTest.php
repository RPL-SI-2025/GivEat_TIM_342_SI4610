<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LihatDonasiTest extends DuskTestCase
{
    /**
     * Test untuk lihat donasi
     * @group lihatdonasi
     */
    public function test_lihat_donasi()
    {
        $this->browse(function (Browser $browser) {
            // Login as user with ID 2
            $user = User::find(2);

            $browser->loginAs($user)
                ->visit('/mitra/donations')
                ->assertSee('Makanan');
        });
    }
}