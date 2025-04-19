<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Claim;
use App\Models\Donation;
use App\Models\Recipient;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClaimControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test store method in ClaimController.
     */
    public function test_store_creates_claim_and_redirects_back()
    {
        // Buat data dummy untuk pengujian
        $user = User::factory()->create();
        $recipient = Recipient::factory()->create(['user_id' => $user->id]);
        $donation = Donation::factory()->create();

        // Simulasikan login
        $this->actingAs($user);

        // Kirim permintaan POST ke endpoint store
        $response = $this->from('/klaimmakanan')->post('/claims', [
            'donation_id' => $donation->id,
        ]);

        // Pastikan klaim berhasil dibuat di database
        $this->assertDatabaseHas('claims', [
            'recipient_id' => $recipient->user_id,
            'donation_id' => $donation->id,
        ]);

        // Pastikan pengguna diarahkan kembali ke halaman sebelumnya
        $response->assertRedirect('/klaimmakanan');

        // Pastikan session flash 'show_modal' tersedia
        $response->assertSessionHas('show_modal', true);
    }
}