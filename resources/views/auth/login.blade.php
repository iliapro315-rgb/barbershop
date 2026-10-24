@extends('layouts.app')

@section('title', 'Вход')

@section('content')
    <h1>Вход</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <p>
            <label>E-mail</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </p>

        <p>
            <label>Пароль</label><br>
            <input type="password" name="password" required>
        </p>

        <p>
            <label>
                <input type="checkbox" name="remember">
                Запомнить
            </label>
        </p>

        <button type="submit">Войти</button>
    </form>

    <p><a href="{{ route('register') }}">Регистрация</a></p>
@endsection