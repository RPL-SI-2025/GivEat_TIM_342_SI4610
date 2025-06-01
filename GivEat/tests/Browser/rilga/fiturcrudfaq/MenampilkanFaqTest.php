<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenampilkanFaqTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group faqshow
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $user = \App\Models\User::find(2); 

            $browser->loginAs($user)
                    ->visit('/admin/faq')
                    ->assertPathIs('/admin/faq')
                    ->assertSee('Apa itu Laravel');
        });
    }
}