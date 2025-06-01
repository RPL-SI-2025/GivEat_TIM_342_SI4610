<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .form-control,
        .form-select {
            border: 1px solid #E5E7EB;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            border-radius: 0.75rem;
            height: 48px;
        }

        textarea.form-control {
            height: auto;
            min-height: 120px;
        }

        .form-label {
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }

        .btn {
            font-size: 0.875rem;
            padding: 0.5rem 1.25rem;
            height: 40px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: var(--giveat-primary, #006837);
            border-color: var(--giveat-primary, #006837);
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #02190B;
            border-color: #02190B;
        }

        .btn-outline-secondary:hover {
            background-color: #f3f4f6;
            border-color: #E5E7EB;
        }
    </style>
    @endpush

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-4 d-flex align-items-center">
                    <div>
                        <h1 class="h3 mb-0">Tambah Berita</h1>
                        <p class="text-muted mb-0">Silakan isi informasi berita yang akan ditambahkan.</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Judul --}}
                            <div class="mb-4">
                                <label for="judul" class="form-label text-muted">Judul Berita</label>
                                <input type="text" name="judul" id="judul"
                                    class="form-control @error('judul') is-invalid @enderror"
                                    value="{{ old('judul') }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Gambar --}}
                            <div class="mb-4">
                                <label for="gambar" class="form-label text-muted">Gambar</label>
                                <input type="file" name="gambar" id="gambar"
                                    class="form-control @error('gambar') is-invalid @enderror" required>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Ringkasan --}}
                            <div class="mb-4">
                                <label for="ringkasan" class="form-label text-muted">Ringkasan</label>
                                <textarea name="ringkasan" id="ringkasan" rows="3"
                                    class="form-control @error('ringkasan') is-invalid @enderror"
                                    placeholder="Ringkasan berita">{{ old('ringkasan') }}</textarea>
                                @error('ringkasan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Isi --}}
                            <div class="mb-4">
                                <label for="isi" class="form-label text-muted">Isi Berita</label>
                                <textarea name="isi" id="isi" rows="10"
                                    class="form-control @error('isi') is-invalid @enderror"
                                    placeholder="Isi lengkap berita">{{ old('isi') }}</textarea>
                                @error('isi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Buttons --}}
                            <div class="d-flex justify-content-end gap-3 mt-4">
                                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                    <i class="bi bi-arrow-left"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary rounded-pill px-4">
                                    <i class="bi bi-plus-lg"></i> Tambah Berita
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
