<?php

namespace Tests\Feature;

use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function halaman_review_dapat_diakses()
    {
        $response = $this->get(route('review'));
        $response->assertStatus(200);
    }
}
