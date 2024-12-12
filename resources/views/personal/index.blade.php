@extends('layouts.main')
@section('title', 'Статьи')

@section('content')

    <div class="container mt-3">
        <a href="{{ route('index') }}" class="mb-3 btn btn-outline-secondary">Назад</a>
        <a href="{{ route('personal.articles.index') }}" class="mb-3 btn btn-outline-secondary">Статьи</a>
    </div>

@endsection
