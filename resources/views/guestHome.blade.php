@extends('layouts.app')

@section('title', 'Article')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <h1>Conferences</h1>
    <br>
    @auth
        <a href="{{ route('articles.create') }}" class="btn btn-success">Create</a>
    @endauth

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            @auth
                <th>Actions</th>
            @endauth
        </tr>
        </thead>
        <tbody>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->content }}</td>
                @auth
                    <td>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-link"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete this article?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
