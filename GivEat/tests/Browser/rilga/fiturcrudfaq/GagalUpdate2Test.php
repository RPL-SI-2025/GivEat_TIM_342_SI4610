<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GagalUpdate2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group faqgagalupdate2
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(2); 

            $browser->loginAs($user)
                    ->visit('/admin/faq')
                    ->assertPathIs('/admin/faq')
                    ->click('@edit')
                    ->assertPathIs('/admin/faq/edit/6')
                    ->type('question', 'Apa itu Laravel?')
                    ->type('answer', '')
                    ->press('Simpan Perubahan')
                    ->pause(1000)
                    ->screenshot('faq-gagal-update2');
        });
    }
}
