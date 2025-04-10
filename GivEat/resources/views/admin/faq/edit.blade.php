@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit FAQ</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" value="{{ old('question', $faq->question) }}">
                            @error('question')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea name="answer" class="form-control @error('answer') is-invalid @enderror">{{ old('answer', $faq->answer) }}</textarea>
                            @error('answer')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.faq.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection