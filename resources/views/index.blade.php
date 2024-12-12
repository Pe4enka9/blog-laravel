@extends('layouts.main')
@section('title', 'Главная')

@section('content')

    <div class="container mt-3">
        <form action="{{ route('logout') }}" method="post" class="mb-3">
            @csrf
            <input type="submit" value="Выйти" class="btn btn-outline-secondary">
        </form>
        <h1 class="mb-3 text-primary">Главная</h1>
    </div>

@endsection
