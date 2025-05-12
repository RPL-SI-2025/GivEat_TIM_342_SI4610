<x-app-layout>
    <div class="min-h-screen bg-gray-50 p-6">
        <h1 class="text-2xl font-bold text-green-700 mb-6">Selamat Datang, Admin!</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-5">
                <h2 class="text-md font-semibold text-green-700">Jumlah Mitra Terdaftar</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalMitra }}</p>
            </div>
            <div class="bg-white rounded-xl shadow p-5">
                <h2 class="text-md font-semibold text-green-700">Jumlah User Terdaftar</h2>
                <p class="text-3xl font-bold mt-2">{{ $totalUser }}</p>
            </div>
        </div>

        <!-- MITRA TABLE -->
        <div class="bg-white rounded-xl shadow p-6 mb-10">
            <h2 class="text-lg font-semibold text-green-700 mb-4">Daftar Mitra</h2>
            <table class="w-full table-auto border border-gray-200 text-left">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Detail Informasi</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mitras as $mitra)
                    <tr class="border-b hover:bg-green-50">
                        <td class="p-3 font-medium text-green-800">{{ $mitra->name }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $mitra->email }}</td>
                        <td class="p-3">
                            <div class="flex gap-2">
                                <button type="button" onclick='showModal(@json($mitra))' class="text-blue-600 hover:underline text-sm">Detail</button>
                                <form action="{{ route('admin.user.destroy', $mitra->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus mitra ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- USER TABLE -->
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold text-green-700 mb-4">Daftar User</h2>
            <table class="w-full table-auto border border-gray-200 text-left">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Detail Informasi</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b hover:bg-green-50">
                        <td class="p-3 font-medium text-green-800">{{ $user->name }}</td>
                        <td class="p-3 text-sm text-gray-700">{{ $user->email }}</td>
                        <td class="p-3">
                            <div class="flex gap-2">
                                <button type="button" onclick='showModal(@json($user))' class="text-blue-600 hover:underline text-sm">Detail</button>
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- MODAL -->
        <div id="detailModal" class="fixed z-50 inset-0 bg-black bg-opacity-40 hidden justify-center items-center">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-lg font-bold text-green-700 mb-4">Detail Pengguna</h2>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li><strong>Nama:</strong> <span id="modal-name"></span></li>
                    <li><strong>Email:</strong> <span id="modal-email"></span></li>
                    <li><strong>Password:</strong> <span id="modal-password"></span></li>
                    <li><strong>Tanggal Registrasi:</strong> <span id="modal-created"></span></li>
                    <li><strong>Jumlah Transaksi:</strong> <span id="modal-transactions"></span></li>
                </ul>
                <div class="mt-6 text-right">
                    <button onclick="closeModal()" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Tutup</button>
                </div>
            </div>
        </div>

        <script>
            function showModal(user) {
                document.getElementById('modal-name').textContent = user.name;
                document.getElementById('modal-email').textContent = user.email;
                document.getElementById('modal-password').textContent = user.password;
                document.getElementById('modal-created').textContent = new Date(user.created_at).toLocaleString();
                document.getElementById('modal-transactions').textContent = user.donations_count ?? 0;
                document.getElementById('detailModal').classList.remove('hidden');
                document.getElementById('detailModal').classList.add('flex');
            }

            function closeModal() {
                document.getElementById('detailModal').classList.remove('flex');
                document.getElementById('detailModal').classList.add('hidden');
            }
        </script>
    </div>
</x-app-layout>
