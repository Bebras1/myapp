@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Create Article</h1>
        <hr>
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="8" required>{{ old('content') }}</textarea>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('loginGuest') }}" class="btn btn-danger me-3">Cancel</a>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
@endsection
