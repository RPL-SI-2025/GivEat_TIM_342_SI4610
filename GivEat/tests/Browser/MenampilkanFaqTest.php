<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenampilkanFaqTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group show
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertPathIs('/')
                    ->clickLink('faq') // click link Create
                    ->assertPathIs('/admin/faq')
                    ->assertSee('Apa itu Laravel');
        });
    }
}