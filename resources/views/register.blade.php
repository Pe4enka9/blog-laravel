@extends('layouts.main')
@section('title', 'Регистрация')

@section('content')

    <div class="container mt-3">
        <h1 class="mb-3 text-primary">Регистрация</h1>

        <div class="row">
            <div class="col-4">
                <form action="{{ route('register.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" name="login" id="login"
                               class="form-control {{ $errors->has('login') ? 'is-invalid' : '' }}"
                               value="{{ old('login') }}">
                        @error('login')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" name="password" id="password"
                               class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Повторите пароль</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    </div>

                    <input type="submit" value="Зарегистрироваться" class="mb-3 btn btn-success">

                    <div>Уже есть аккаунт? <a href="{{ route('login.show') }}">Войдите!</a></div>
                </form>
            </div>
        </div>
    </div>

@endsection
