@extends('layouts.app')

@section('title', 'Tambah Mitra Restoran')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-xl shadow mt-10">
        <h1 class="text-2xl font-bold mb-6">Tambah Mitra Restoran</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Nama Restoran</label>
                <input type="text" name="name" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Alamat</label>
                <input type="text" name="address" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Jam Operasional</label>
                <input type="text" name="operational_hours" class="w-full border p-2 rounded" placeholder="Contoh: 09:00 - 21:00">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Upload Gambar</label>
                <input type="file" name="image" class="w-full border p-2 rounded" accept="image/*">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Koordinat Lokasi</label>
                <div class="flex gap-4">
                    <input type="text" name="latitude" id="latitude" class="w-1/2 border p-2 rounded" placeholder="Latitude" required>
                    <input type="text" name="longitude" id="longitude" class="w-1/2 border p-2 rounded" placeholder="Longitude" required>
                </div>
            </div>

            <div id="map" class="w-full h-[400px] my-4 rounded shadow"></div>

            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                Simpan Mitra
            </button>
        </form>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <script>
        const map = L.map('map').setView([-6.2, 106.816], 13);
        let marker;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
            maxZoom: 18,
        }).addTo(map);

        function updateLatLng(lat, lng) {
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        }

        map.on('click', function(e) {
            const lat = e.latlng.lat.toFixed(6);
            const lng = e.latlng.lng.toFixed(6);

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }

            updateLatLng(lat, lng);
        });

        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            map.setView([lat, lng], 14);
        });
    </script>
@endpush
