<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MengeditFaqTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group edit
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // visit halaman notes
                    ->assertPathIs('/')
                    ->clickLink('faq') // click link Create
                    ->assertPathIs('/admin/faq')
                    ->clickLink('Edit') // click link Edit
                    ->assertPathIs('/admin/faq/1/edit')
                    ->type('question', 'Apa itu Laravel?') // isi form
                    ->type('answer', 'Laravel adalah framework PHP yang digunakan untuk membangun aplikasi web.') // isi form
                    ->press('Update'); // tekan tombol Simpan
        });
    }
}
