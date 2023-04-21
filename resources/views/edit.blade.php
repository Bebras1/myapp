@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            <form action="{{ route('articles.update', $article->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" id="content" name="content" value="{{ $article->content }}">
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
