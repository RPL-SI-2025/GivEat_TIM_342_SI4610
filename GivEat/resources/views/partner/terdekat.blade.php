@extends('layouts.app')

@section('title', 'Mitra Terdekat')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Mitra Terdekat dari Lokasi Anda</h1>

    <div id="map" class="w-full h-[400px] mb-6 rounded shadow"></div>
    <div id="daftar-mitra" class="space-y-4"></div>
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
        const radius = 5; // km

        function getDistance(lat1, lon1, lat2, lon2) {
            const R = 6371;
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a =
                Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon/2) * Math.sin(dLon/2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
            return R * c;
        }

        navigator.geolocation.getCurrentPosition(pos => {
            const userLat = pos.coords.latitude;
            const userLon = pos.coords.longitude;

            map.setView([userLat, userLon], 13);

            L.marker([userLat, userLon], {
                icon: L.icon({
                    iconUrl: 'https://cdn-icons-png.flaticon.com/512/684/684908.png',
                    iconSize: [30, 30],
                    iconAnchor: [15, 30],
                })
            }).addTo(map).bindPopup("Lokasi Anda Sekarang").openPopup();

            const nearby = [];

            mitras.forEach(mitra => {
                if (mitra.latitude && mitra.longitude) {
                    const dist = getDistance(userLat, userLon, mitra.latitude, mitra.longitude);
                    if (dist <= radius) {
                        nearby.push({...mitra, distance: dist});
                        L.marker([mitra.latitude, mitra.longitude])
                            .addTo(map)
                            .bindPopup(`<strong>${mitra.name}</strong><br>${mitra.address}<br>${dist.toFixed(2)} km`);
                    }
                }
            });

            nearby.sort((a, b) => a.distance - b.distance);
            const container = document.getElementById('daftar-mitra');
            if (nearby.length === 0) {
                container.innerHTML = `<p class="text-center text-gray-600 italic">Tidak ada mitra dalam radius ${radius} KM</p>`;
            } else {
                nearby.forEach(m => {
                    container.innerHTML += `
                        <div class="bg-white p-4 border rounded shadow">
                            <h2 class="font-semibold text-lg">${m.name}</h2>
                            <p class="text-sm text-gray-600">${m.address}</p>
                            <p class="text-xs text-pink-600">📍 ${m.distance.toFixed(2)} km dari Anda</p>
                        </div>
                    `;
                });
            }

        }, () => {
            alert("Gagal mengakses lokasi kamu 😢");
        });
    </script>
@endpush
