@extends('layouts.app')

@section('title', 'Article')

@section('content')
    <h1>Articles</h1>
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
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                    </form>
                </td>
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
