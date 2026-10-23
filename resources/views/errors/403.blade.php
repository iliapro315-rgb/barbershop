@extends('layouts.app')

@section('title', 'Доступ запрещён')

@section('content')
    <h1>403</h1>
    <p>{{ $exception->getMessage() ?: 'Нужен ключ администратора' }}</p>
    <p><a href="{{ route('home') }}">Вернуться на главную</a></p>
@endsection