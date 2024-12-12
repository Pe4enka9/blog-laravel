@extends('layouts.main')
@section('title', 'Статьи')

@section('content')

    <div class="container mt-3">
        <a href="{{ route('personal.index') }}" class="mb-3 btn btn-outline-secondary">Назад</a>
        <h1 class="mb-3 text-primary">Статьи</h1>

        <div class="row">
            @foreach($articles as $article)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->text }}</p>
                            <a href="#" class="btn btn-primary">Подробнее</a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <form>
                                    <label for="is_moderated" class="me-1 form-check-label">Модерация</label>
                                    <input type="checkbox" name="is_moderated" id="is_moderated"
                                           class="form-check-input" {{ $article->is_moderated ? 'checked' : '' }}">
                                </form>
                            </li>
                            <li class="list-group-item">Категория: {{ $article->category->name }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
