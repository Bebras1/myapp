@extends('layouts.app')

@section('title', 'Article')

@section('content')
    <h1>Articles</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->content }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('articles.create') }}" class="btn btn-success">Create</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
