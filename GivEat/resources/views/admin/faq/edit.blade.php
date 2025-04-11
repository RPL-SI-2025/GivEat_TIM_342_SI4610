@extends('layouts.admin')

@section('content')
<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header" style="background-color: #146C43;">
                    <h5 class="mb-0 text-white">Edit FAQ</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="question" class="form-label fw-semibold">Question</label>
                            <input 
                                type="text" 
                                name="question" 
                                class="form-control @error('question') is-invalid @enderror" 
                                value="{{ old('question', $faq->question) }}" 
                                placeholder="Update the question...">
                            @error('question')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="answer" class="form-label fw-semibold">Answer</label>
                            <textarea 
                                name="answer" 
                                class="form-control @error('answer') is-invalid @enderror" 
                                rows="4" 
                                placeholder="Update the answer...">{{ old('answer', $faq->answer) }}</textarea>
                            @error('answer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.faq.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn text-white" style="background-color: #146C43;">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
