@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    .donation-detail {
        max-width: 1000px;
        margin: 0 auto;
    }

    .donation-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 0.5rem 0.5rem 0 0;
    }

    .food-info {
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .food-badge {
        background-color: #E8F5E9;
        color: #2E7D32;
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        font-size: 0.875rem;
    }

    .food-time {
        color: #6B7280;
        font-size: 0.875rem;
    }

    .food-portion {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: white;
        border: 1px solid #E5E7EB;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        color: var(--giveat-primary);
    }

    .food-portion i {
        font-size: 1.25rem;
    }

    .food-location {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem;
        background: #F9FAFB;
        border-radius: 0.5rem;
    }

    .food-location i {
        color: #6B7280;
    }

    :root {
        --giveat-primary: #006837;
        --giveat-text: #111827;
    }

    .donation-image {
        width: 100%;
        height: 380px;
        object-fit: cover;
        border-radius: 1rem;
        display: block;
    }

    .donation-info {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        margin: 10px;
        padding: 10px;
    }

    .tag {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .tag-food {
        background-color: #E8F5E9;
        color: #2E7D32;
    }

    .tag-drink {
        background-color: #E3F2FD;
        color: #1565C0;
    }

    .portion-badge {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background: white;
        border: 1px solid #E5E7EB;
        border-radius: 0.5rem;
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--giveat-primary);
    }

    .portion-badge small {
        font-size: 0.75rem;
        color: #6B7280;
        font-weight: normal;
    }

    .location-map {
        width: 100%;
        height: 200px;
        background: #f3f4f6;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .review {
        border-bottom: 1px solid #E5E7EB;
        padding: 1rem 0;
    }

    .review:last-child {
        border-bottom: none;
    }

    .review-rating {
        color: #FFA000;
    }

    .review-date {
        color: #6B7280;
        font-size: 0.875rem;
    }

    .btn-primary {
        background-color: var(--giveat-primary);
        border-color: var(--giveat-primary);
    }

    .btn-primary:hover {
        background-color: #005a2f;
        border-color: #005a2f;
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('donations.index') }}" class="text-decoration-none text-muted">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="donation-detail">
                <div class="food-info mb-4 pt-3">
                    @if($donation->image)
                        <div class="px-3">
                            <img src="{{ asset('storage/' . $donation->image) }}" 
                                 alt="{{ $donation->name }}" 
                                 class="donation-image">
                        </div>
                    @endif
                    <div class="p-4">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h1 class="h3 mb-3">{{ $donation->name }}</h1>
                            <div class="d-flex flex-wrap gap-2 align-items-center">
                                <span class="food-badge">{{ $donation->category->name }}</span>
                                <span class="food-time">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ \Carbon\Carbon::parse($donation->pickup_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($donation->pickup_time)->addHour()->format('H:i') }}
                                </span>
                            </div>
                        </div>
                        <div class="food-portion">
                            <i class="bi bi-people-fill"></i>
                            <span>{{ $donation->portion }} Porsi</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p class="text-muted mb-4">{{ $donation->description }}</p>
                        <div class="food-location">
                            <i class="bi bi-geo-alt"></i>
                            <span>{{ $donation->location }}</span>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('donations.edit', $donation) }}" class="btn btn-outline-primary">
                            <i class="bi bi-pencil me-1"></i> Edit
                        </a>
                        <form action="{{ route('donations.destroy', $donation) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus donasi ini?')">
                                <i class="bi bi-trash me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Show selected image name
    document.getElementById('image')?.addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        document.querySelector('.selected-file').textContent = fileName || '';
    });
</script>
@endpush

@endsection
