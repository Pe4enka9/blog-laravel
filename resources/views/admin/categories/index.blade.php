@extends('layouts.main')
@section('title', 'Категории')

@section('content')

    <div class="container mt-3">
        <a href="{{ route('admin.index') }}" class="mb-3 btn btn-outline-secondary">Назад</a>
        <h1 class="mb-3 text-primary">Категории</h1>
        <a href="{{ route('categories.create') }}" class="mb-3 btn btn-primary">Добавить</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}"
                           class="btn btn-primary">Редактировать</a>
                    </td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Удалить" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
