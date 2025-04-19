@extends('layouts.app')

@section('title', 'Edit Mitra')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Mitra Restoran</h1>

    <form action="{{ route('partner.update', $mitra->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Nama Restoran</label>
            <input type="text" name="name" value="{{ $mitra->name }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Alamat</label>
            <input type="text" name="address" value="{{ $mitra->address }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Jam Operasional</label>
            <input type="text" name="operational_hours" value="{{ $mitra->operational_hours }}" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Gambar Saat Ini</label><br>
            @if($mitra->image)
                <img src="{{ asset('storage/' . $mitra->image) }}" class="w-40 rounded shadow mb-2">
            @else
                <p class="italic text-gray-500">Belum ada gambar</p>
            @endif

            <input type="file" name="image" class="w-full border p-2 rounded mt-2">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Koordinat Lokasi</label>
            <div class="flex gap-4">
                <input type="text" name="latitude" id="latitude" value="{{ $mitra->latitude }}" class="w-1/2 border p-2 rounded">
                <input type="text" name="longitude" id="longitude" value="{{ $mitra->longitude }}" class="w-1/2 border p-2 rounded">
            </div>
        </div>

        <div id="map" class="w-full h-[400px] my-4 rounded shadow"></div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
            Update Mitra
        </button>
    </form>
@endsection

<script>
    const map = L.map('map').setView([{{ $mitra->latitude }}, {{ $mitra->longitude }}], 14);
    let marker = L.marker([{{ $mitra->latitude }}, {{ $mitra->longitude }}]).addTo(map);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    map.on('click', function(e) {
        const lat = e.latlng.lat.toFixed(6);
        const lng = e.latlng.lng.toFixed(6);
        marker.setLatLng(e.latlng);
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });
</script>
