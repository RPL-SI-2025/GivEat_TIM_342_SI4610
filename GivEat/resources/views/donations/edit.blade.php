@extends('layouts.app')

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

    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:focus {
        background-color: #02190B !important;
        border-color: #02190B !important;
    }

    .btn-outline-secondary {
        border-color: #E5E7EB;
        color: var(--giveat-text);
    }

    .btn-outline-secondary:hover,
    .btn-outline-secondary:active,
    .btn-outline-secondary:focus {
        background-color: #f3f4f6;
        border-color: #E5E7EB;
        color: var(--giveat-text);
    }
</style>
@endpush

@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        document.querySelector('.selected-file').textContent = fileName || '';
    });
</script>
@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="mb-4 d-flex align-items-center">
                <div>
                    <h1 class="h3 mb-0">Edit Makanan</h1>
                    <p class="text-muted mb-0">Perbarui informasi makanan yang akan didonasikan</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('donations.update', $donation->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label text-muted">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name', $donation->name) }}" 
                                       placeholder="Nama Makanan" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="category_id" class="form-label text-muted">Kategori</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" 
                                        id="category_id" name="category_id" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $donation->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="description" class="form-label text-muted">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3" 
                                          placeholder="Deskripsi makanan" required>{{ old('description', $donation->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="pickup_time" class="form-label text-muted">Waktu Pengambilan</label>
                                <input type="datetime-local" class="form-control @error('pickup_time') is-invalid @enderror" 
                                       id="pickup_time" name="pickup_time" value="{{ old('pickup_time', \Carbon\Carbon::parse($donation->pickup_time)->format('Y-m-d\TH:i')) }}" required>
                                @error('pickup_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="portion" class="form-label text-muted">Jumlah Porsi</label>
                                <input type="number" class="form-control @error('portion') is-invalid @enderror" 
                                       id="portion" name="portion" value="{{ old('portion', $donation->portion) }}" min="1">
                                @error('portion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="location" class="form-label text-muted">Lokasi</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                       id="location" name="location" value="{{ old('location', $donation->location) }}" 
                                       placeholder="Lokasi pengambilan" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label text-muted">Gambar Makanan</label>
                            <div class="d-flex align-items-center gap-3">
                                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('image').click()">
                                    <i class="bi bi-upload me-2"></i> Pilih Gambar
                                </button>
                                <input type="file" class="d-none @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*">
                                <span class="selected-file text-muted"></span>
                            </div>
                            <small class="text-muted d-block mt-2">Maksimal 5MB</small>
                            @if($donation->image)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $donation->image) }}" 
                                         alt="{{ $donation->name }}" 
                                         class="img-thumbnail rounded" 
                                         style="max-height: 200px;">
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-5">
                            <a href="{{ route('donations.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                <i class="bi bi-check-lg"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
