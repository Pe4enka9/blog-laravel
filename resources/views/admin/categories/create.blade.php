@extends('layouts.main')
@section('title', 'Добавить категорию')

@section('content')

    <div class="container mt-3">
        <a href="{{ route('categories.index') }}" class="mb-3 btn btn-outline-secondary">Назад</a>
        <h1 class="mb-3 text-primary">Добавить категорию</h1>

        <div class="row">
            <div class="col-3">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" name="name" id="name"
                               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                               value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" value="Добавить" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

@endsection
