<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function PHPSTORM_META\type;

class MembuatFaqTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group create
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // visit halaman notes
                    ->assertPathIs('/')
                    ->clickLink('faq') // click link Create
                    ->assertPathIs('/admin/faq')
                    ->clickLink('Add FAQ') // click link Create
                    ->type('question', 'Apa itu Laravel?') // isi form
                    ->type('answer', 'Laravel adalah framework PHP yang digunakan untuk membangun aplikasi web.') // isi form
                    ->press('Submit'); // tekan tombol Simpan
        });
    }
}
