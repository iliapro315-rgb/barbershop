@extends('layouts.app')

@section('title', 'Контакты')

@section('content')
    <h1>Контакты</h1>
    <p><strong>Адрес:</strong> {{ $address }}</p>
    <p><strong>Телефон:</strong> {{ $phone }}</p>
    <p><strong>E-mail:</strong> {{ $email }}</p>
@endsection