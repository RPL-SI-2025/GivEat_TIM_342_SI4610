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
     * @group faqcreate
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
                    ->type('answer', 'Laravel adalah framework PHP yang digunakan untuk membangun aplikasi web.')
                    ->press('Simpan FAQ')
                    ->assertSee('FAQ created successfully');
        });
    }
}
