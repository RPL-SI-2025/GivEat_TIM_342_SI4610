<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateReviewTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group create
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/reviews/create')
                    ->assertSee('Tambah Ulasan Baru')
                    ->type('nama_restoran', 'Jabarano')
                    ->type('nama_hidangan', 'Matcha Latte')
                    ->pause(2000)                 
                    ->click('label[for="star5"]')
                    ->type('deskripsi_ulasan', 'Sangat Enak!')
                    ->scrollIntoView('#copyright')
                    ->click('Kirim Ulasan');
        });
    }
}