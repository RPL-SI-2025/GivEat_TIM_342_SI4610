<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenghapusFaqTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group delete
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') // visit halaman notes
                    ->assertPathIs('/')
                    ->clickLink('faq') // click link Create
                    ->assertPathIs('/admin/faq')
                    ->press('Delete');
        });
    }
}
