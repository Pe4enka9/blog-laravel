@extends('layouts.main')
@section('title', 'Главная')

@section('content')

    <div class="container mt-3">
        <a href="{{ route('logout') }}" class="mb-3 btn btn-outline-secondary">Выйти</a>
        <h1 class="mb-3 text-primary">Главная</h1>
    </div>

@endsection
