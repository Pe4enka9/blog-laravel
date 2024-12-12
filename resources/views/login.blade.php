@extends('layouts.main')
@section('title', 'Авторизация')

@section('content')

    <div class="container mt-3">
        <h1 class="mb-3 text-primary">Авторизация</h1>

        <div class="row">
            <div class="col-4">
                <form action="{{ route('login.store') }}" method="post">
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

                    @if($errors->has('attempt'))
                        <div class="alert alert-danger">{{ $errors->first('attempt') }}</div>
                    @endif

                    <input type="submit" value="Войти" class="mb-3 btn btn-success">

                    <div>Ещё нет аккаунта? <a href="{{ route('register.show') }}">Зарегистрируйтесь!</a></div>
                </form>
            </div>
        </div>
    </div>

@endsection
