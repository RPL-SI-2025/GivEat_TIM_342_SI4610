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

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="mb-4 d-flex align-items-center">
                    <div>
                        <h1 class="h3 mb-0">Edit FAQ</h1>
                        <p class="text-muted mb-0">Perbarui pertanyaan dan jawaban pada halaman FAQ</p>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="question" class="form-label text-muted">Pertanyaan</label>
                                <input
                                    type="text"
                                    name="question"
                                    id="question"
                                    dusk="question"
                                    required
                                    class="form-control @error('question') is-invalid @enderror"
                                    value="{{ old('question', $faq->question) }}"
                                    placeholder="Tulis pertanyaan di sini...">
                                @error('question')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="answer" class="form-label text-muted">Jawaban</label>
                                <textarea
                                    name="answer"
                                    id="answer"
                                    dusk="answer"
                                    rows="5"
                                    required
                                    class="form-control @error('answer') is-invalid @enderror"
                                    placeholder="Tulis jawaban di sini...">{{ old('answer', $faq->answer) }}</textarea>
                                @error('answer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-3 mt-5">
                                <a href="{{ route('admin.faq.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                    <i class="bi bi-arrow-left"></i> Batal
                                </a>
                                <button type="submit" id="update-faq" dusk="update-faq" class="btn btn-primary rounded-pill px-4">
                                    <i class="bi bi-check-lg"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
