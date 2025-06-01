<x-app-layout>
    {{-- Tambahkan CSS Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha200-ZcdApeVNadMTPOV7lH0ZJLyZgKbG+VC4GigKfOnAEgGhBorgBXAgNufV+BdZwHOg"
          crossorigin=""/>

    <style>
        /* Berikan tinggi pada container peta */
        #mapid { height: 500px; }
    </style>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-4">
                    <h1 class="h3">Lokasi Donasi: {{ $donation->name }}</h1>
                    <p class="text-muted">Berikut adalah lokasi pengambilan donasi.</p>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        @if($donation->location)
                            {{-- Container untuk peta Leaflet --}}
                            <div id="mapid" class="mb-3"></div>

                            {{-- Tombol Buka di Google Maps tetap ada --}}
                            {{-- Pindahkan gambar ke dalam tag <a> dan sesuaikan gayanya --}}
                            <a href="https://maps.google.com/?q={{ urlencode($donation->location) }}" target="_blank" class="btn mt-2 text-white" style="background:#15803D;">
                                Buka di Google Maps
                            </a>
                        @else
                            <p class="text-danger">Alamat lokasi tidak tersedia untuk donasi ini.</p>
                        @endif

                        <div class="mt-4">
                            <a href="{{ route('claim.food', $donation->id) }}" class="btn btn-secondary">Kembali ke Detail Donasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tambahkan JS Leaflet --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha200-zL6bnMTrKaCjQigwpzCx7v7sP2t+mzRSlhtOUQ0hTXqrCoZFvXf+Ef+gdZ+yLKKp"
            crossorigin=""></script>

    <script>
        @if($donation->location)
            // Ambil alamat dari data PHP
            const address = "{{ $donation->location }}";
            const mapElement = document.getElementById('mapid');

            if (address && mapElement) {
                // Gunakan Nominatim (layanan geocoding OSM) untuk mencari koordinat dari alamat
                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data && data.length > 0) {
                            const lat = parseFloat(data[0].lat);
                            const lon = parseFloat(data[0].lon);

                            // Inisialisasi peta
                            const mymap = L.map('mapid').setView([lat, lon], 15); // Set view ke koordinat yang ditemukan

                            // Tambahkan layer tile dari OpenStreetMap
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(mymap);

                            // Tambahkan marker di lokasi yang ditemukan
                            L.marker([lat, lon]).addTo(mymap)
                                .bindPopup(`<b>Lokasi Donasi</b><br>${address}`)
                                .openPopup();

                        } else {
                            // Jika geocoding gagal
                            mapElement.innerHTML = '<p class="text-warning">Tidak dapat menemukan koordinat untuk alamat ini.</p>';
                            mapElement.style.height = 'auto'; // Sesuaikan tinggi jika tidak ada peta
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching geocoding data:', error);
                        mapElement.innerHTML = '<p class="text-danger">Terjadi kesalahan saat mencari lokasi.</p>';
                         mapElement.style.height = 'auto'; // Sesuaikan tinggi jika tidak ada peta
                    });
            } else if (mapElement) {
                 mapElement.innerHTML = '<p class="text-warning">Alamat donasi tidak tersedia.</p>';
                 mapElement.style.height = 'auto'; // Sesuaikan tinggi jika tidak ada peta
            }
        @endif
    </script>
</x-app-layout>