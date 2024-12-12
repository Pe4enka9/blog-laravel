@extends('layouts.main')
@section('title', 'Статьи')

@section('content')

    <div class="container mt-3">
        <a href="{{ route('admin.index') }}" class="mb-3 btn btn-outline-secondary">Назад</a>
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
                                           class="form-check-input"
                                           {{ $article->is_moderated ? 'checked' : '' }} data-id="{{ $article->id }}">
                                </form>
                            </li>
                            <li class="list-group-item">Категория: {{ $article->category->name }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).on('submit', 'form', function (e) {
            e.preventDefault();
        });

        $(document).on('change', '#is_moderated', function () {

            $.ajax({
                url: '/admin/articles/update',
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $(this).data('id'),
                    is_moderated: $(this).is(':checked') ? 1 : 0,
                },
                error: function () {
                    console.error('Ошибка!');
                },
            });
        });
    </script>

@endsection
