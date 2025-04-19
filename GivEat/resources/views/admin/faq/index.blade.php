@extends('layouts.admin')

@section('content')
<div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow rounded-3">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #146C43;">
                    <h5 class="mb-0 text-white fw-semibold">📋 FAQ Management</h5>
                    <a href="{{ route('admin.faq.create') }}" class="btn btn-light btn-sm fw-semibold">
                        Add FAQ
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="text-center text-dark" style="background-color: #E9ECEF;">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">🗨️ Question</th>
                                    <th scope="col">💬 Answer</th>
                                    <th scope="col">⚙️ Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($faqs as $faq)
                                <tr>
                                    <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td style="word-break: break-word; max-width: 300px;">{{ $faq->answer }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.faq.edit', $faq->id) }}" 
                                            class="btn btn-success btn-sm me-1">
                                            ✏️ Edit
                                        </a>
                                        <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="btn btn-danger btn-sm"
                                                dusk="delete-faq-{{ $faq->id }}"
                                                onclick="return confirm('Are you sure to delete this FAQ?')">
                                                🗑️ Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        <em>No FAQs found.</em>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
