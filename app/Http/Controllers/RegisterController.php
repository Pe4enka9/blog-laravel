<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function show(): View
    {
        return view('register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'login' => ['required', 'unique:users,login', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'login.unique' => 'Такой логин уже занят!',
            'login.max' => 'Логин не должен быть длиннее :max символов!',

            'password.min' => 'Пароль не должен быть меньше :min символов!',
            'password.confirmed' => 'Пароли не совпадают!',
        ]);

        $user = User::query()->create([
            'login' => $validated['login'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user, true);

        return redirect()->route('index');
    }
}
