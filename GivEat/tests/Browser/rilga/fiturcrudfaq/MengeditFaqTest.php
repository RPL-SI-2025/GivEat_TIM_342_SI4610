<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MengeditFaqTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group faqedit
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(2); 

            $browser->loginAs($user)
                    ->visit('/admin/faq')
                    ->assertPathIs('/admin/faq')
                    ->click('@edit')
                    ->assertPathIs('/admin/faq/edit/2')
                    ->type('question', 'Apa itu Laravel?') 
                    ->type('answer', 'Laravel adalah framework PHP yang digunakan untuk membangun aplikasi web.')
                    ->press('Simpan Perubahan')
                    ->assertSee('FAQ berhasil diperbarui.');
        });
    }
}
