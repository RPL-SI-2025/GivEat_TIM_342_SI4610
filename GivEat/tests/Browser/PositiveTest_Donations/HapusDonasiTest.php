<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HapusDonasiTest extends DuskTestCase
{
    /**
     * Test untuk menghapus donasi
     * @group hapusdonasi
     */
    public function test_delete_donation()
    {
        $this->browse(function (Browser $browser) {
            // Login as user with ID 2
            $user = User::find(2);

            $browser->loginAs($user)
                ->visit('/mitra/donations')
                ->pause(1000) // Wait for the page to load completely
                ->screenshot('before-delete') // Take screenshot before deletion
                ->click('@delete-donation-button') // Click delete button
                ->waitForDialog(5) // Wait for the dialog to appear
                ->assertDialogOpened('Apakah Anda yakin ingin menghapus donasi ini?')
                ->acceptDialog() // Click OK on the confirmation dialog
                ->waitForText('Donasi berhasil dihapus!', 5) // Wait for success message
                ->screenshot('after-delete') // Take screenshot after deletion
                ->assertSee('Donasi berhasil dihapus!'); // Verify success message
        });
    }
}