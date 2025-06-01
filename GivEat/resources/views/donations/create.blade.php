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

    .btn-outline-secondary:hover,
    .btn-outline-secondary:active,
    .btn-outline-secondary:focus {
        background-color: #f3f4f6;
        border-color: #E5E7EB;
        color: var(--giveat-text);
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="mb-4 d-flex align-items-center">
                <div>
                    <h1 class="h3 mb-0">Tambah Makanan</h1>
                    <p class="text-muted mb-0">Hai {{ auth()->user()->name ?? 'Robert' }}, Mulai donasi sekarang!</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('donations.store') }}" enctype="multipart/form-data">
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

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label text-muted">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" 
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
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                          placeholder="Deskripsi makanan" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="pickup_time" class="form-label text-muted">Waktu Pengambilan <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control @error('pickup_time') is-invalid @enderror"
       id="pickup_time" name="pickup_time" value="{{ old('pickup_time') }}" required>
                                <div class="invalid-feedback" id="pickupTimeError"></div>
                                @error('pickup_time')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="portion" class="form-label text-muted">Jumlah Porsi</label>
                                <input type="number" class="form-control @error('portion') is-invalid @enderror" 
                                       id="portion" name="portion" value="{{ old('portion', 1) }}" min="1">
                                @error('portion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="location" class="form-label text-muted">Lokasi</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                       id="location" name="location" value="{{ old('location') }}" 
                                       placeholder="Lokasi pengambilan" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label text-muted">Gambar Makanan <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-center gap-3">
                                <button type="button" id="imageButton" class="btn btn-outline-secondary rounded-pill px-4" onclick="document.getElementById('image').click()">
                                    <i class="bi bi-upload me-2"></i> Pilih Gambar
                                </button>
                                <input type="file" class="d-none @error('image') is-invalid @enderror" 
                                       id="image" name="image" accept="image/*" required>
                                <span class="selected-file text-muted"></span>
                            </div>
                            <div class="invalid-feedback d-none" id="imageError">
                                Silakan pilih gambar terlebih dahulu
                            </div>
                            <small class="text-muted d-block mt-2">Maksimal 5MB</small>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-5">
                            <a href="{{ route('donations.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                <i class="bi bi-plus-lg"></i> Tambah Makanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pickupInput = document.getElementById('pickup_time');
        if (pickupInput) {
            const now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset()); // Sesuaikan timezone
            pickupInput.min = now.toISOString().slice(0,16); // Format: YYYY-MM-DDTHH:MM
        }
    });
    // Image upload validation
    document.getElementById('image').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        const imageButton = document.getElementById('imageButton');
        const imageError = document.getElementById('imageError');
        const selectedFile = document.querySelector('.selected-file');
        
        if (fileName) {
            selectedFile.textContent = fileName;
            imageButton.classList.remove('border-danger', 'text-danger');
            imageError.classList.add('d-none');
        } else {
            selectedFile.textContent = '';
            imageButton.classList.add('border-danger', 'text-danger');
            imageError.classList.remove('d-none');
        }
    });

    // Form submit validation with enhanced image feedback
    document.querySelector('form').addEventListener('submit', function(e) {
        const imageInput = document.getElementById('image');
        const imageButton = document.getElementById('imageButton');
        const imageError = document.getElementById('imageError');
        
        if (!imageInput.files || !imageInput.files[0]) {
            e.preventDefault();
            imageButton.classList.add('border-danger', 'text-danger');
            imageError.classList.remove('d-none');
            
            // Scroll to image input and shake the button for attention
            imageButton.scrollIntoView({ behavior: 'smooth', block: 'center' });
            imageButton.classList.add('shake-animation');
            setTimeout(() => {
                imageButton.classList.remove('shake-animation');
            }, 650);
        }
    });
</script>
@endpush
</div>
@endsection
