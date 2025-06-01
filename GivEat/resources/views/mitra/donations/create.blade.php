<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        :root {
            --giveat-primary: #006837;
            --giveat-text: #374151;
            --primary: #006837;
        } 
        
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

        /* Style focus/active */
        .form-control:focus,
        .form-select:focus,
        .form-control:active,
        .form-select:active {
            border-color: #006837 !important;
            box-shadow: 0 0 0 0.25rem rgba(0, 104, 55, 0.25) !important;
            outline: none !important;
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
            background-color: #006837;
            border-color: #006837;
            font-weight: 500;
            color: white;
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
            background-color: #f3f4f6 !important;
            border-color: #E5E7EB !important;
            color: #374151 !important;
        }
        
        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary:focus {
            background-color: #004d27 !important;
            border-color: #004d27 !important;
        }

        /* Tambahan animasi shake */
        .shake-animation {
            animation: shake 0.5s;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }
    </style>
    @endpush

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="mb-4 d-flex align-items-center">
                    <div>
                        <h1 class="h3 mb-0" style="font-weight: 700 !important;">Tambah Makanan</h1>
                        <p class="text-muted mb-0">Hai {{ auth()->user()->name ?? 'Mitra' }}, Mulai donasi sekarang!</p>
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
                                           placeholder="Nama Makanan" required
                                           style="border: 1px solid #E5E7EB; padding: 0.75rem 1rem; border-radius: 0.5rem; height: 48px; font-size: 0.9rem; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="category_id" class="form-label text-muted">Kategori</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" 
                                            id="category_id" name="category_id" required
                                            style="border: 1px solid #E5E7EB; padding: 0.75rem 1rem; border-radius: 0.5rem; height: 48px; font-size: 0.9rem; background-color: white; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
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
                                              placeholder="Deskripsi makanan" required
                                              style="border: 1px solid #E5E7EB; padding: 0.75rem 1rem; border-radius: 0.5rem; min-height: 120px; font-size: 0.9rem; resize: vertical; line-height: 1.5; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="pickup_time" class="form-label text-muted">Waktu Pengambilan <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control @error('pickup_time') is-invalid @enderror"
                                           id="pickup_time" name="pickup_time" value="{{ old('pickup_time') }}" required
                                           style="border: 1px solid #E5E7EB; padding: 0.75rem 1rem; border-radius: 0.5rem; height: 48px; font-size: 0.9rem;">
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
                                           id="portion" name="portion" value="{{ old('portion', 1) }}" min="1"
                                           style="border: 1px solid #E5E7EB; padding: 0.75rem 1rem; border-radius: 0.5rem; height: 48px; font-size: 0.9rem;">
                                    @error('portion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="location" class="form-label text-muted">Lokasi</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                           id="location" name="location" value="{{ old('location') }}" 
                                           placeholder="Lokasi pengambilan" required
                                           style="border: 1px solid #E5E7EB; padding: 0.75rem 1rem; border-radius: 0.5rem; height: 48px; font-size: 0.9rem;">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="form-label text-muted">Gambar Makanan <span class="text-danger">*</span></label>
                                <div class="d-flex align-items-center gap-3">
                                    <button type="button" id="imageButton" class="btn btn-outline-secondary" onclick="document.getElementById('image').click()" style="border-radius: 50rem; padding-left: 1.25rem; padding-right: 1.25rem;">
                                        <i class="bi bi-upload me-2"></i> Pilih Gambar
                                    </button>
                                    <input type="file" class="d-none @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*" required
                                           style="display: none;">
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
                                <a href="{{ route('mitra.donations.index') }}" class="btn btn-outline-secondary" style="border-radius: 50rem; padding-left: 1.25rem; padding-right: 1.25rem;">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary" style="border-radius: 50rem; padding-left: 1.25rem; padding-right: 1.25rem; background-color: #006837; border-color: #006837; color: white; font-weight: 500;">
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
                // Set timezone ke Asia/Jakarta (UTC+7)
                const now = new Date();
                const timeZone = 'Asia/Jakarta';
                
                // Format tanggal dan waktu sesuai dengan format yang diharapkan input datetime-local
                const options = {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false,
                    timeZone: timeZone
                };
                
                // Dapatkan waktu sekarang di timezone Jakarta
                const formatter = new Intl.DateTimeFormat('en-US', options);
                const parts = formatter.formatToParts(now).reduce((acc, part) => {
                    acc[part.type] = part.value;
                    return acc;
                }, {});
                
                // Format ke YYYY-MM-DDTHH:MM
                const minDate = `${parts.year}-${parts.month}-${parts.day}T${parts.hour}:${parts.minute}`;
                
                // Set nilai minimum untuk input
                pickupInput.min = minDate;
                
                // Jika nilai belum diisi, set ke waktu sekarang
                if (!pickupInput.value) {
                    pickupInput.value = minDate;
                }
            }
        });

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

        document.querySelector('form').addEventListener('submit', function(e) {
            const imageInput = document.getElementById('image');
            const imageButton = document.getElementById('imageButton');
            const imageError = document.getElementById('imageError');
            
            if (!imageInput.files || !imageInput.files[0]) {
                e.preventDefault();
                imageButton.classList.add('border-danger', 'text-danger');
                imageError.classList.remove('d-none');
                imageButton.scrollIntoView({ behavior: 'smooth', block: 'center' });
                imageButton.classList.add('shake-animation');
                setTimeout(() => {
                    imageButton.classList.remove('shake-animation');
                }, 650);
            } 
        });
    </script>
    @endpush
</x-app-layout>
