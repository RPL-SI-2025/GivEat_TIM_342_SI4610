<?php

namespace Tests\Browser;


use App\Models\Category;
use App\Models\Donation;
use App\Models\Partner;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Carbon\Carbon;


class EditDonasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group editdonasi
     */

     public function test_edit_donation()
{
    $this->browse(function (Browser $browser) {
        $user = \App\Models\User::find(2);
        $category = \App\Models\Category::first() ?? \App\Models\Category::factory()->create();

        $browser->loginAs($user)
            ->visit('/mitra/donations')
            ->click('@edit-donation-button')
            ->type('name', 'Makanan')
            ->select('category_id', $category->id)
            ->type('description', 'Deskripsi donasi makanan')
            ->type('portion', 3)
            ->type('location', 'Bandung')
            ->attach('image', UploadedFile::fake()->image('donasi.jpg'));
        $datetime = now()->addDay()->format('Y-m-d\TH:i');
        $browser->script([
            "document.querySelector('[name=\"pickup_time\"]').value = '{$datetime}';"
        ]);

        $browser->press('Simpan Perubahan')
            ->assertSee('Donasi berhasil diperbarui!');
    });
}
}     