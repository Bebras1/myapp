@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
    <h1>Edit Article</h1>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{ $article->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Article</button>
    </form>

    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete Article</button>
    </form>
@endsection
