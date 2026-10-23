@extends('layouts.app')

@section('title', 'Страница не найдена')

@section('content')
    <h1>404</h1>
    <p>Страница не найдена.</p>
    <p><a href="{{ route('home') }}">Вернуться на главную</a></p>
@endsection