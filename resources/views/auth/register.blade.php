@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <h1>Регистрация</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <p>
            <label>Имя</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus>
        </p>

        <p>
            <label>E-mail</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </p>

        <p>
            <label>Пароль</label><br>
            <input type="password" name="password" required>
        </p>

        <p>
            <label>Повтор пароля</label><br>
            <input type="password" name="password_confirmation" required>
        </p>

        <button type="submit">Зарегистрироваться</button>
    </form>

    <p><a href="{{ route('login') }}">Уже есть аккаунт? Войти</a></p>
@endsection