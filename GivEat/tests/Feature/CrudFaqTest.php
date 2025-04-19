<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Faq;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CrudFaqTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /** @test */
    public function user_can_create_a_faq()
    {
        $response = $this->post('/admin/faq', [
            'question' => 'Apa itu GivEat?',
            'answer' => 'GivEat adalah platform makanan berbasis donasi.',
        ]);

        // Pastikan status redirect benar
        $response->assertRedirect('/admin/faq');
        
        // Pastikan data tersimpan di database
        $this->assertDatabaseHas('faqs', [
            'question' => 'Apa itu GivEat?',
            'answer' => 'GivEat adalah platform makanan berbasis donasi.',
        ]);
    }

    /** @test */
    public function user_can_view_faq_list()
    {
        Faq::create([
            'question' => 'Apa itu GivEat?',
            'answer' => 'GivEat adalah platform makanan berbasis donasi.',
        ]);

        $response = $this->get('/admin/faq');
        $response->assertStatus(200);
        $response->assertSee('Apa itu GivEat?');
    }

    /** @test */
    public function user_can_update_a_faq()
{
    $faq = Faq::create([
        'question' => 'Pertanyaan lama',
        'answer' => 'Jawaban lama',
    ]);

    $response = $this->put("/admin/faq/{$faq->id}", [
        'question' => 'Pertanyaan baru',
        'answer' => 'Jawaban baru',
    ]);
    
    $response->assertRedirect('/admin/faq');
    
    // Refresh model
    $faq->refresh();

}

    /** @test */
public function user_can_delete_a_faq()
{
    // Membuat FAQ pertama
    $faq = Faq::create([
        'question' => 'Pertanyaan untuk dihapus',
        'answer' => 'Jawaban untuk dihapus',
    ]);

    // Melakukan delete
    $response = $this->delete("/admin/faq/{$faq->id}");

    // Pastikan redirect setelah delete
    $response->assertRedirect('/admin/faq');
    
    // Debugging: Cek apakah data benar-benar hilang dari database

}


    /** @test */
    public function create_faq_validation_error_when_question_is_empty()
    {
        $response = $this->post('/admin/faq', [
            'question' => '',
            'answer' => 'Isi jawaban',
        ]);

        // Pastikan ada error pada field question
        $response->assertSessionHasErrors(['question']);
    }

    /** @test */
    public function create_faq_validation_error_when_answer_is_empty()
    {
        $response = $this->post('/admin/faq', [
            'question' => 'Isi pertanyaan',
            'answer' => '',
        ]);

        // Pastikan ada error pada field answer
        $response->assertSessionHasErrors(['answer']);
    }
}