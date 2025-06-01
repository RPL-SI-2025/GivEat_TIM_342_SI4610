<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenghapusFaqTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group faqdelete
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(2); 

            $browser->loginAs($user)
                    ->visit('/admin/faq')
                    ->assertPathIs('/admin/faq')
                    ->click('@hapus')
                    ->assertDialogOpened('Apakah Anda yakin ingin menghapus FAQ ini?')
                    ->acceptDialog()
                    ->pause(1000)
                    ->assertSee('FAQ berhasil dihapus.');
        });
    }
}
