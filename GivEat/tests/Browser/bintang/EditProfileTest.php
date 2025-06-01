<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
            ->visit('/')
            ->assertSee('Selamat Datang Kembali')
            ->clickLink('Daftar')
            ->assertPathIs('/register') 
            ->type('name', 'Bintang')
            ->pause(2000) 
            ->type('email', 'bintang@gmail.com') 
            ->pause(2000) 
            ->type('password', 'Bintang123') 
            ->pause(2000) 
            ->type('password_confirmation', 'Bintang123')
            ->pause(2000) 
            ->check('terms') 
            ->pause(2000) 
            ->press('Daftar')
            ->pause(2000) 
            ->assertPathIs('/donations/1')
            ->pause(2000)
            ->click('img[alt="Profile"]')
            ->pause(2000)
            ->assertPathIs('/profile')
            ->pause(2000)
            ->visit('/profile')
            ->pause(2000)
            ->press('Ganti foto profil')
            ->pause(2000)
            ->assertVisible('#uploadModal')
            ->pause(2000)
            ->attach('image', storage_path('app/public/profile/profile1.jpg')) // 'foto' = name atau id dari input file
            ->pause(2000)
            ->press('Unggah')
            ->pause(2000)
            ->type('name', 'Bintang Preciosa')
            ->pause(2000)
            ->type('gender', 'Laki-laki')
            ->pause(2000)
            ->type('city', 'Bandung')
            ->pause(2000)
            ->press('Simpan')
            ->pause(2000)
            ->visit('/donations/1')
            ->pause(2000)
            ->visit('/profile')
            ->pause(2000)
            ->press('Hapus Foto')
            ->pause(2000)
            ->whenAvailable('#deletePhotoModal', function ($modal) {
                $modal->press('Hapus');  
            })
            ->pause(2000)
            ->clickLink('Ganti Password')
            ->pause(2000)
            ->type('current_password', 'Bintang123')
            ->pause(2000)
            ->type('new_password', 'Bintang12345')
            ->pause(2000)
            ->type('new_password_confirmation', 'Bintang12345')
            ->pause(2000)
            ->press('Simpan')
            ->pause(2000)
            ->press('Keluar')
            ->pause(2000)
            ->type('email', 'bintang@gmail.com')
            ->pause(2000)
            ->type('password', 'Bintang12345')
            ->pause(2000)
            ->press('Masuk')
            ->pause(2000)
            ->assertPathIs('/donations/1')
            ->pause(2000);
        });
    }
}
