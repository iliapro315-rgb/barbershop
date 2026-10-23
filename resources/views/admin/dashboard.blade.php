@extends('layouts.admin')

@section('title', 'Панель администратора')

@section('content')
    <h1>Панель администратора</h1>
    <p>Добро пожаловать в админ-раздел барбершопа.</p>
    <ul>
        <li><a href="{{ route('admin.services.index') }}">Список услуг</a></li>
        <li><a href="{{ route('admin.services.create') }}">Добавить услугу</a></li>
    </ul>
@endsection