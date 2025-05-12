<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giveat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans">

    {{-- Hero --}}
    <section class="bg-black text-white h-screen flex flex-col justify-center items-center text-center bg-cover bg-center" style="background-image: url('{{ asset('images/hero.jpg') }}');">
        <div class="bg-black bg-opacity-60 p-10 rounded-xl">
            <h1 class="text-4xl font-bold mb-4">{{ $content['hero_title'] ?? 'Default Hero Title' }}</h1>
            <p>{{ $content['hero_description'] ?? 'Default Hero Description' }}</p>
        </div>
    </section>

    {{-- Statistik --}}
    <section class="bg-white text-center py-16 shadow-md">
        <div class="grid grid-cols-3 gap-4 max-w-4xl mx-auto">
            <div>
                <h2 class="text-4xl font-bold">{{ $content['statistic_donatur'] ?? '0' }}</h2>
                <p>Donatur Makanan</p>
            </div>
            <div>
                <h2 class="text-4xl font-bold">{{ $content['statistic_penerima'] ?? '0' }}</h2>
                <p>Penerima Makanan</p>
            </div>
            <div>
                <h2 class="text-4xl font-bold">{{ $content['statistic_distribusi'] ?? '0' }}</h2>
                <p>Makanan Terdistribusi</p>
            </div>
        </div>
    </section>

    {{-- Misi Kami --}}
    <section class="bg-gray-50 py-16">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold">{{ $content['misi_title'] ?? 'Misi Kami' }}</h2>
            <p class="text-gray-600 mt-2">{{ $content['misi_subtitle'] ?? 'Subtitle misi kami' }}</p>
        </div>
        <div class="grid grid-cols-3 gap-6 max-w-5xl mx-auto text-left">
            <div>
                <h4 class="font-semibold">Komitmen Kami</h4>
                <p>{{ $content['misi_komitmen'] ?? 'Komitmen kami terhadap masyarakat.' }}</p>
            </div>
            <div>
                <h4 class="font-semibold">Dampaknya</h4>
                <p>{{ $content['misi_dampak'] ?? 'Dampak dari kegiatan ini sangat luas.' }}</p>
            </div>
            <div>
                <h4 class="font-semibold">Pentingnya</h4>
                <p>{{ $content['misi_pentingnya'] ?? 'Penting untuk keberlanjutan kehidupan.' }}</p>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-6 max-w-5xl mx-auto text-left mt-10">
            <div>
                <h4 class="font-semibold">Tekad Kami</h4>
                <p>{{ $content['misi_tekad'] ?? 'Tekad kami untuk selalu berbagi.' }}</p>
            </div>
            <div>
                <h4 class="font-semibold">Visi Kami</h4>
                <p>{{ $content['misi_visi'] ?? 'Visi kami adalah masyarakat yang peduli.' }}</p>
            </div>
        </div>
    </section>

    {{-- Tentang --}}
    <section class="bg-green-700 text-white py-16">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold mb-2">{{ $content['tentang_title'] ?? 'Tentang GivEat' }}</h2>
            <p class="mb-6">{{ $content['tentang_subtitle'] ?? 'GivEat adalah platform berbagi makanan.' }}</p>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <h4 class="font-semibold">Siapa Kami?</h4>
                    <p>{{ $content['tentang_siapa'] ?? 'Kami adalah tim sosial yang peduli.' }}</p>
                </div>
                <div>
                    <h4 class="font-semibold">Bagaimana Dimulai?</h4>
                    <p>{{ $content['tentang_dimulai'] ?? 'GivEat dimulai dengan niat baik.' }}</p>
                </div>
                <div>
                    <h4 class="font-semibold">Apa yang Kami Lakukan?</h4>
                    <p>{{ $content['tentang_lakukan'] ?? 'Kami menghubungkan donatur dan penerima.' }}</p>
                </div>
                <div>
                    <h4 class="font-semibold">Membuat Perubahan</h4>
                    <p>{{ $content['tentang_perubahan'] ?? 'Kami membuat perubahan melalui aksi nyata.' }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimoni --}}
    <section class="bg-white py-16">
        <h2 class="text-2xl font-bold text-center mb-6">Cerita Mereka</h2>
        <div class="grid grid-cols-3 gap-4 max-w-6xl mx-auto">
            <div class="p-4 bg-gray-100 rounded-lg shadow">
                <p>"{{ $content['testimoni_1'] ?? 'Testimoni pertama' }}"</p>
            </div>
            <div class="p-4 bg-gray-100 rounded-lg shadow">
                <p>"{{ $content['testimoni_2'] ?? 'Testimoni kedua' }}"</p>
            </div>
            <div class="p-4 bg-gray-100 rounded-lg shadow">
                <p>"{{ $content['testimoni_3'] ?? 'Testimoni ketiga' }}"</p>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white text-center py-6 text-sm">
        <p>© 2025 GivEat Food Cycle. All Rights Reserved.</p>
    </footer>

</body>
</html>
