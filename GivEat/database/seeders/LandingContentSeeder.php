<?php

use Illuminate\Database\Seeder;
use App\Models\LandingContent;

class LandingContentSeeder extends Seeder
{
    public function run()
    {
        LandingContent::insert([
            ['section' => 'hero_title', 'content' => 'Makananmu berlebih? Ubah jadi kebaikan untuk sekitar'],
            ['section' => 'hero_description', 'content' => 'Jangan biarkan makanan berlebih terbuang sia-sia! Dengan Giveat, kamu bisa mendonasikan makanan...'],
            ['section' => 'statistic_donatur', 'content' => '400'],
            ['section' => 'statistic_penerima', 'content' => '1320'],
            ['section' => 'statistic_distribusi', 'content' => '4572'],

            ['section' => 'misi_title', 'content' => 'Misi Kami'],
            ['section' => 'misi_subtitle', 'content' => 'Misi Kami Adalah Memastikan Tidak Ada Makanan...'],
            ['section' => 'misi_komitmen', 'content' => 'Giveat hadir untuk mengurangi kelaparan...'],
            ['section' => 'misi_dampak', 'content' => 'Dengan Giveat, setiap makanan berlebih dapat mengurangi...'],
            ['section' => 'misi_pentingnya', 'content' => 'Jutaan ton makanan terbuang setiap tahun...'],
            ['section' => 'misi_tekad', 'content' => 'Kami berkomitmen untuk membangun ekosistem berbagi...'],
            ['section' => 'misi_visi', 'content' => 'Dunia tanpa pemborosan makanan dan kelaparan...'],

            ['section' => 'tentang_title', 'content' => 'Tentang GivEat'],
            ['section' => 'tentang_subtitle', 'content' => 'Platform donasi makanan yang menghubungkan...'],
            ['section' => 'tentang_siapa', 'content' => 'Misi Sosial untuk Menghubungkan Kelebihan dengan Kebutuhan...'],
            ['section' => 'tentang_dimulai', 'content' => 'Dari Masalah Pemborosan Pangan, Hadir Solusi Berbagi...'],
            ['section' => 'tentang_lakukan', 'content' => 'Mengurangi Limbah Pangan, Meningkatkan Kepedulian...'],
            ['section' => 'tentang_perubahan', 'content' => 'Mengubah Kelebihan Menjadi Harapan...'],

            ['section' => 'testimoni_1', 'content' => 'Giveat membuat berbagi makanan jadi lebih mudah dan bermanfaat...'],
            ['section' => 'testimoni_2', 'content' => 'Dulu saya bingung harus bagaimana dengan makanan berlebih...'],
            ['section' => 'testimoni_3', 'content' => 'Terima kasih GivEat! Berkat aplikasi ini...'],
        ]);
    }
}
