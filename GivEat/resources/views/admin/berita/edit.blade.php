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

        .form-control:focus,
        .form-select:focus {
            border-color: var(--giveat-primary);
            box-shadow: 0 0 0 0.25rem rgba(0, 104, 55, 0.1);
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
            background-color: var(--giveat-primary);
            border-color: var(--giveat-primary);
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #02190B !important;
            border-color: #02190B !important;
        }

        .btn-outline-secondary {
            border-color: #E5E7EB;
            color: var(--giveat-text);
        }

        .btn-outline-secondary:hover {
            background-color: #f3f4f6;
            border-color: #E5E7EB;
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('gambar');
            const fileNameDisplay = document.querySelector('.selected-file');

            imageInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                fileNameDisplay.textContent = file?.name || '';

                if (file && file.size > 5 * 1024 * 1024) {
                    alert('Ukuran gambar maksimal 5MB.');
                    e.target.value = '';
                    fileNameDisplay.textContent = '';
                }
            });
        });
    </script>
    @endpush

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="mb-4 d-flex align-items-center">
                    <div>
                        <h1 class="h3 mb-0">{{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }}</h1>
                        <p class="text-muted mb-0">{{ isset($berita) ? 'Perbarui informasi berita' : 'Masukkan informasi berita baru' }}</p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form 
                            action="{{ isset($berita) ? route('admin.berita.update', $berita->id) : route('admin.berita.store') }}" 
                            method="POST" 
                            enctype="multipart/form-data"
                        >
                            @csrf
                            @if(isset($berita))
                                @method('PUT')
                            @endif

                            {{-- Judul --}}
                            <div class="mb-4">
                                <label for="judul" class="form-label text-muted">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                    id="judul" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" placeholder="Judul berita">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Ringkasan --}}
                            <div class="mb-4">
                                <label for="ringkasan" class="form-label text-muted">Ringkasan</label>
                                <textarea class="form-control @error('ringkasan') is-invalid @enderror" 
                                    id="ringkasan" name="ringkasan" rows="3">{{ old('ringkasan', $berita->ringkasan ?? '') }}</textarea>
                                @error('ringkasan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Isi --}}
                            <div class="mb-4">
                                <label for="isi" class="form-label text-muted">Isi Berita</label>
                                <textarea class="form-control @error('isi') is-invalid @enderror" 
                                    id="isi" name="isi" rows="10">{{ old('isi', $berita->isi ?? '') }}</textarea>
                                @error('isi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Gambar --}}
                            <div class="mb-4">
                                <label for="gambar" class="form-label text-muted">Gambar</label>
                                <div class="d-flex align-items-center gap-3">
                                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('gambar').click()">
                                        <i class="bi bi-upload"></i> Pilih Gambar
                                    </button>
                                    <input type="file" class="d-none @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*">
                                    <span class="selected-file text-muted"></span>
                                </div>
                                <small class="text-muted d-block mt-2">Maksimal 5MB</small>
                                @error('gambar')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror

                                @if(isset($berita) && $berita->gambar)
                                    <div class="mt-3">
                                        <img src="{{ asset('images/' . $berita->gambar) }}" 
                                            alt="Preview" class="img-thumbnail rounded" style="max-height: 200px;">
                                    </div>
                                @endif
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="d-flex justify-content-end gap-3 mt-5">
                                <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                    <i class="bi bi-arrow-left"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary rounded-pill px-4">
                                    <i class="bi bi-check-lg"></i> {{ isset($berita) ? 'Update' : 'Tambah' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
