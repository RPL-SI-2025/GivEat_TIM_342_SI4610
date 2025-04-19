<?php

namespace Tests\Browser;

use App\Models\Faq;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CrudFaqTest extends DuskTestCase
{
    /** @test */
    public function user_can_create_a_faq()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/faq/create')
                    ->type('question', 'Apa itu GivEat?')
                    ->type('answer', 'GivEat adalah platform makanan berbasis donasi.')
                    ->press('Submit')  // Gantilah sesuai dengan tombol yang ada
                    ->assertPathIs('/admin/faq')
                    ->assertSee('FAQ berhasil dibuat'); // Gantilah dengan teks yang sesuai
        });
    }

    /** @test */
    public function user_can_view_faq_list()
    {
        Faq::create([
            'question' => 'Apa itu GivEat?',
            'answer' => 'GivEat adalah platform makanan berbasis donasi.',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/faq')
                    ->assertSee('Apa itu GivEat?');
        });
    }

    /** @test */
    public function user_can_update_a_faq()
    {
        $faq = Faq::create([
            'question' => 'Pertanyaan lama',
            'answer' => 'Jawaban lama',
        ]);

        $this->browse(function (Browser $browser) use ($faq) {
            $browser->visit('/admin/faq/' . $faq->id . '/edit')
                    ->type('question', 'Pertanyaan baru')
                    ->type('answer', 'Jawaban baru')
                    ->press('Submit')  // Gantilah sesuai dengan tombol yang ada
                    ->assertPathIs('/admin/faq')
                    ->assertSee('FAQ berhasil diperbarui'); // Gantilah dengan teks yang sesuai
        });
    }

    /** @test */
    public function user_can_delete_a_faq()
    {
        $faq = Faq::create([
            'question' => 'Pertanyaan untuk dihapus',
            'answer' => 'Jawaban untuk dihapus',
        ]);

        $this->browse(function (Browser $browser) use ($faq) {
            $browser->visit('/admin/faq')
                    ->press('Delete')  // Gantilah dengan tombol delete yang sesuai
                    ->assertPathIs('/admin/faq')
                    ->assertSee('FAQ berhasil dihapus'); // Gantilah dengan teks yang sesuai
        });
    }

    /** @test */
    public function create_faq_validation_error_when_question_is_empty()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/faq/create')
                    ->type('question', '')
                    ->type('answer', 'Isi jawaban')
                    ->press('Submit')  // Gantilah dengan tombol yang sesuai
                    ->assertSee('The question field is required.');
        });
    }

    /** @test */
    public function create_faq_validation_error_when_answer_is_empty()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/faq/create')
                    ->type('question', 'Isi pertanyaan')
                    ->type('answer', '')
                    ->press('Submit')  // Gantilah dengan tombol yang sesuai
                    ->assertSee('The answer field is required.');
        });
    }
}
