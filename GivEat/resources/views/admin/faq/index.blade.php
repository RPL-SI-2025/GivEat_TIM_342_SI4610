@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">FAQ Management</h3>
                    <a href="{{ route('admin.faq.create') }}" class="btn btn-primary float-right">Add New FAQ</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faqs as $faq)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->answer }}</td>
                                <td>
                                    <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-sm btn-info">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection