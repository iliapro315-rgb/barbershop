@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <h1>{{ config('app.name') }}</h1>
    <p>Добро пожаловать в наш барбершоп. Выберите услугу или запишитесь к мастеру.</p>
    <p><a href="{{ route('services.index') }}">Смотреть услуги →</a></p>
@endsection