<?php

namespace Tests\Browser;

use App\Models\ForumTopic;
use App\Models\ForumComment;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ForumDiskusiTest extends DuskTestCase
{
    /**
     * Bagian Admin
     */
     public function testLoginAdmin(): void
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/')
                     ->clickLink(link:"Log in")
                     ->type(field:"email", value:"admin@giveat.com")
                     ->type(field:"password", value:"admin12345")
                     ->press(button:"LOG IN");
         });
     }

    public function testAdminDeleteForumTopic(): void
    {
        $forumtopik = ForumTopic::factory()->create();

        $this->browse(function (Browser $browser) use ($forumtopik) {
            $browser->visit('/admin/forum')
                    ->pause(500)
                    ->click("@delete-topik-{$forumtopik->id}")
                    ->acceptDialog()
                    ->pause(1000)
                    ->assertDontSee($forumtopik->title)
                    ->assertSee('Topik berhasil dihapus.'); 
        });
    }

    public function testAdminDeleteForumCommant(): void
    {
        $forumtopik = ForumTopic::factory()->create();
        $comment = ForumComment::factory()->create(['forum_topic_id' => $forumtopik->id]);

        $this->browse(function (Browser $browser) use ($forumtopik, $comment) {
            $browser->visit('/admin/forum')
                    ->pause(500)
                    ->click('@show-topic-' . $forumtopik->id)
                    ->pause(500)
                    ->click("@delete-comment-{$comment->id}")
                    ->acceptDialog()
                    ->pause(500)
                    ->assertDontSee($comment->komentar); 
        });
    }

     public function testlogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/berita')
                    ->click('button[data-bs-toggle="dropdown"]')
                    ->press('Logout');
        });
    }

    /**
     * Bagian User
     */
    public function testLoginUser(): void
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/')
                     ->clickLink(link:"Log in")
                     ->type(field:"email", value:"user@giveat.com")
                     ->type(field:"password", value:"user12345")
                     ->press(button:"LOG IN");
         });
     }

    public function testTambahTopik(): void
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/forum')
                     ->pause(500)
                     ->clickLink("Buat Postingan")
                     ->type(field:"title", value:"Makanan")
                     ->type(field:"content", value:"Apa Makanan Kesukaan Kam")
                     ->press(button:"Posting")
                     ->pause(500)
                     ->assertSee('Topik berhasil dibuat.');
         });
     }

    public function testEditForumTopic(): void
    {
        $forumtopik = ForumTopic::factory()->create();
        $this->browse(function (Browser $browser) use ($forumtopik) {
            $browser->visit('/forum/'.$forumtopik->id)
                    ->clickLink("Edit")
                    ->type(field:"title", value:"Judul Berita Diupdate")
                    ->type(field:"content", value:"Isi berita yang sudah diupdate")
                    ->press(button:"Simpan Perubahan")
                    ->assertSee('Judul Berita Diupdate');
        });
    }

    public function testHapusForumTopic(): void
    {
        $forumtopik = ForumTopic::factory()->create();
        $this->browse(function (Browser $browser) use ($forumtopik) {
            $browser->visit('/forum/'.$forumtopik->id)
                    ->press(button:'Hapus')
                    ->acceptDialog()
                    ->pause(500)
                    ->assertSee("Postingan berhasil dihapus!");
        });
    }

    public function testTambahKomentar(): void
    {
        $forumtopik = ForumTopic::factory()->create();
        $this->browse(function (Browser $browser) use ($forumtopik) {
            $browser->visit('/forum/'.$forumtopik->id)
                    ->pause(500)
                    ->type('komentar', 'Komentar pertama')
                    ->press('Kirim')
                    ->pause(500)
                    ->assertSee('Komentar pertama');
        });
    }

    public function testEditKomentar(): void
    {
        $forumtopik = ForumTopic::factory()->create();
        $comment = ForumComment::factory()->create(['forum_topic_id' => $forumtopik->id]);

        $this->browse(function (Browser $browser) use ($forumtopik, $comment) {
            $browser->visit('/forum/'.$forumtopik->id)
                    ->pause(3000) 
                    ->waitFor('#edit-comment-' . $comment->id) 
                    ->click('#edit-comment-' . $comment->id) 
                    ->type('komentar', 'Komentar diupdate')
                    ->press('Simpan')
                    ->pause(500)
                    ->assertSee('Komentar diupdate');
        });
    }

    public function testHapusKomentar(): void
    {
        $forumtopik = ForumTopic::factory()->create();
        $comment = ForumComment::factory()->create(['forum_topic_id' => $forumtopik->id]);

        $this->browse(function (Browser $browser) use ($forumtopik, $comment) {
            $browser->visit('/forum/'.$forumtopik->id)
                    ->pause(1000) 
                    ->waitFor('#delete-comment-' . $comment->id) 
                    ->click('#delete-comment-' . $comment->id)
                    ->acceptDialog() 
                    ->pause(500) 
                    ->assertDontSee($comment->komentar); 
        });
    }

    public function testExceptionTambahTopik(): void
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/forum')
                     ->pause(500)
                     ->clickLink("Buat Postingan")
                     ->type(field:"title", value:"Makanan")
                     ->press(button:"Posting")
                     ->pause(500)
                     ->assertPathIs('/forum/create');
         });
     }

     public function testExceptionTambahKomentar(): void
    {
        $forumtopik = ForumTopic::factory()->create();
        $this->browse(function (Browser $browser) use ($forumtopik) {
            $browser->visit('/forum/'.$forumtopik->id)
                    ->pause(500)
                    ->press('Kirim')
                    ->pause(500)
                    ->assertDontSee('Komentar pertama');
        });
    }

    public function testFailedEditForumTopicDueToTimeLimit(): void
    {
        // Create a forum topic more than 30 minutes ago
        $forumtopik = ForumTopic::factory()->create([
            'created_at' => now()->subMinutes(31)
        ]);

        $this->browse(function (Browser $browser) use ($forumtopik) {
            $browser->visit('/forum/'.$forumtopik->id)
                    ->pause(1000)
                    ->assertDontSeeLink("Edit");
        });
    }

    public function testFailedEditKomentarDueToTimeLimit(): void
    {
        $forumtopik = ForumTopic::factory()->create();
        $comment = ForumComment::factory()->create([
            'forum_topic_id' => $forumtopik->id,
            'created_at' => now()->subMinutes(31)
        ]);
        $this->browse(function (Browser $browser) use ($forumtopik, $comment) {
            $browser->visit('/forum/'.$forumtopik->id)
                    ->pause(1000)
                    ->assertMissing('#edit-comment-' . $comment->id);
        });
    }    

    public function testFailedDeleteForumTopicDueToTimeLimit(): void
    {
        $forumtopik = ForumTopic::factory()->create([
            'created_at' => now()->subMinutes(31)
        ]);

        $this->browse(function (Browser $browser) use ($forumtopik) {
            $browser->visit('/forum/'.$forumtopik->id)
                    ->pause(1000) 
                    ->assertMissing('#delete-topik-' . $forumtopik->id);;
        });
    }

    public function testFailedDeleteForumCommentDueToTimeLimit(): void
    {
        $forumtopik = ForumTopic::factory()->create();
        $comment = ForumComment::factory()->create([
            'forum_topic_id' => $forumtopik->id,
            'created_at' => now()->subMinutes(31) 
        ]);

        $this->browse(function (Browser $browser) use ($forumtopik, $comment) {
            $browser->visit('/forum/'.$forumtopik->id)
                    ->pause(1000)
                    ->assertMissing('@delete-comment-' . $comment->id);
        });
    }

}
