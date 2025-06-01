<x-app-layout>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4">
                    <h1 class="h3">Tambah Mitra</h1>
                    <p class="text-muted">Silakan isi form di bawah untuk menambahkan mitra baru</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.manajemenmitra.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.manajemenmitra.index') }}" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-success">Simpan Mitra</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
