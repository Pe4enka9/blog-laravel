@extends('layouts.main')
@section('title', 'Админ')

@section('content')

    <div class="container mt-3">
        <a href="{{ route('index') }}" class="mb-3 btn btn-outline-secondary">На главную</a>
        <h1 class="mb-3 text-primary">Админ</h1>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Категории</a>
        <a href="#" class="btn btn-secondary">Статьи</a>
    </div>

@endsection
