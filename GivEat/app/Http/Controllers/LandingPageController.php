<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    // Method untuk menampilkan halaman landing page
    public function index()
    {
        // Data untuk mengisi konten di halaman
        $content = [
            'hero_title' => 'Makananmu berlebih? Ubah jadi kebaikan untuk sekitar',
            'hero_description' => 'Jangan biarkan makanan berlebih terbuang sia-sia! Dengan GivEat, kamu bisa mendonasikan makanan yang masih layak konsumsi kepada mereka yang membutuhkan.',
            'statistic_donatur' => 1000,
            'statistic_penerima' => 5000,
            'statistic_distribusi' => 3000,
            'misi_title' => 'Misi Kami',
            'misi_subtitle' => 'Mengurangi pemborosan makanan dan berbagi kepada yang membutuhkan.',
            'misi_komitmen' => 'Kami berkomitmen untuk mengurangi pemborosan makanan.',
            'misi_dampak' => 'Memberikan dampak positif bagi masyarakat sekitar.',
            'misi_pentingnya' => 'Penting untuk menjaga keberlanjutan bumi.',
            'misi_tekad' => 'Bersama kita bisa membuat perubahan.',
            'misi_visi' => 'Menjadi jembatan antara yang berlebih dan yang membutuhkan.',
            'tentang_title' => 'Tentang GivEat',
            'tentang_subtitle' => 'GivEat adalah platform yang menghubungkan donatur dan penerima makanan.',
            'tentang_siapa' => 'Kami adalah tim yang peduli dengan masalah pemborosan makanan.',
            'tentang_dimulai' => 'GivEat dimulai dari keinginan untuk membantu masyarakat.',
            'tentang_lakukan' => 'Kami mengumpulkan makanan dari donatur dan mendistribusikannya ke penerima.',
            'tentang_perubahan' => 'Kami telah membantu ribuan orang dengan mendistribusikan makanan.',
            'testimoni_1' => 'GivEat membantu kami memberi makan keluarga yang membutuhkan.',
            'testimoni_2' => 'Terima kasih, GivEat, makanan kami tidak terbuang sia-sia.',
            'testimoni_3' => 'Platform yang luar biasa untuk berbagi dan peduli.'
        ];

        // Mengirim data ke view
        return view('landing', compact('content'));
    }
}
