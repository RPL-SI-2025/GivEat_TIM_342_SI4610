<?php

namespace App\Http\Controllers;

use App\Models\Partner;
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
            'misi_subtitle' => 'Misi kami adalah memastikan tidak ada makanan yang terbuang sia-sia, dan tidak ada perut yang kelaparan. Dengan GivEat, berbagi jadi lebih mudah!',
            'misi_komitmen' => 'GivEat hadir untuk mengurangi kelaparan dan pemborosan makanan dengan mendistribusikan makanan berlebih kepada mereka yang membutuhkan. Kami percaya bahwa setiap makanan yang terselamatkan bisa menjadi harapan bagi sesama.',
            'misi_dampak' => 'Dengan GivEat, setiap makanan berlebih dapat mengurangi kelaparan, mengurangi limbah, dan menciptakan komunitas yang lebih peduli. Setiap donasi membawa perubahan nyata bagi mereka yang membutuhkan',
            'misi_pentingnya' => 'Jutaan ton makanan terbuang setiap tahun, sementara banyak orang masih kelaparan. GivEat hadir untuk memastikan makanan berlebih tidak sia-sia, tetapi sampai ke mereka yang membutuhkan',
            'misi_tekad' => 'Kami berkomitmen untuk membangun ekosistem berbagi makanan yang mudah, aman, dan berdampak. Dengan teknologi dan kolaborasi, kami memastikan makanan sampai ke tangan yang tepat',
            'misi_visi' => 'Dunia tanpa pemborosan makanan dan kelaparan. GivEat ingin menciptakan masa depan di mana setiap makanan berlebih menjadi berkah bagi sesama',
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

    public function mitra()
    {
        return view('mitra');
    }

    public function partnerStore(Request $request)
    {
        $status = "success";
        try {
            Partner::create([
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' =>$request->phone,
                'address' =>$request->address,
            ]);
            $message = "Berhasil menyimpan data";
        } catch (\Throwable $th) {
            $status = "failed";
            $message = "Gagal menyimpan data mungkin coba lagi.";
        }

        return redirect()->back()->with($status, $message);
    }
}
