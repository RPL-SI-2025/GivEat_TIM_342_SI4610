<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GagalUpdate1Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group faqgagalupdate1
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
                    ->type('question', '')
                    ->type('answer', 'Laravel adalah framework PHP yang digunakan untuk membangun aplikasi web.')
                    ->press('Simpan Perubahan')
                    ->pause(1000)
                    ->screenshot('faq-gagal-update1');
        });
    }
}
