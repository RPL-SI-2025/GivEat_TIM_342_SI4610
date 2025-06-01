<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReviewMitraTest extends DuskTestCase
{
    /**
     * Test mitra membuka halaman review dan melihat judul.
     * @group reviewmitra
     */
    public function testMitraBukaHalamanReview(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/mitra/review')
                    ->assertPathIs('/mitra/review')
                    ->waitForText('Review')
                    ->assertSee('Review');
        });
    }

    /**
     * Test mitra melihat jumlah makanan terdistribusi dengan dusk attribute.
     */
    public function testMitraLihatJumlahMakananTerdistribusi()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/review')
                    ->waitFor('@total-distribusi', 10)
                    ->assertVisible('@total-distribusi')
                    ->screenshot('jumlah_makanan_terdistribusi');
        });
    }

    /**
     * Test mitra melihat review penerima dengan dusk attribute.
     */
    public function testMitraLihatReviewPenerima()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(1)
                    ->visit('/review')
                    ->waitFor('@review-penerima', 10)
                    ->assertVisible('@review-penerima')
                    ->screenshot('review_penerima');
        });
    }

}