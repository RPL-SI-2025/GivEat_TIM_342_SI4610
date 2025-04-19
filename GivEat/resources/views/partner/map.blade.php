@extends('layouts.app')

@section('title', 'Peta Mitra')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Peta Semua Mitra Restoran</h1>

    <div id="map" class="w-full h-[400px] rounded shadow"></div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <script>
        const map = L.map('map').setView([-6.2, 106.8], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap',
            maxZoom: 18,
        }).addTo(map);

        const mitras = @json($mitras);

        mitras.forEach(mitra => {
            if (mitra.latitude && mitra.longitude) {
                L.marker([mitra.latitude, mitra.longitude])
                    .addTo(map)
                    .bindPopup(`<strong>${mitra.name}</strong><br>${mitra.address}`);
            }
        });
    </script>
@endpush
