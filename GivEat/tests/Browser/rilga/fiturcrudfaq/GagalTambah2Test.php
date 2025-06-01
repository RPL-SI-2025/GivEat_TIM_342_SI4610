<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class GagalTambah2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group faqgagaltambah2
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(2); 

            $browser->loginAs($user)
                    ->visit('/admin/faq')
                    ->assertPathIs('/admin/faq')
                    ->clickLink('Tambah FAQ')
                    ->assertPathIs('/admin/faq/create')
                    ->type('question', 'Apa itu Laravel?')
                    ->press('Simpan FAQ')
                    ->pause(1000)
                    ->screenshot('faq-gagal-tambah2');
        });
    }
}
