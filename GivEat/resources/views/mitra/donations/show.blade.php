<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('mitra.donations.index') }}" class="text-decoration-none text-muted">
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
                                                {{ \Carbon\Carbon::parse($donation->pickup_time)->format('H:i') }} - 
                                                {{ \Carbon\Carbon::parse($donation->pickup_time)->addHour()->format('H:i') }}
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
</x-app-layout>
