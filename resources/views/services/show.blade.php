
@extends('layouts.app')

@section('title', $item['title'])

@section('content')
    <h1>{{ $item['title'] }}</h1>

    @if (!empty($item['description']))
        <p>{{ $item['description'] }}</p>
    @endif

    <p><strong>Цена:</strong> {{ $item['price'] }} ₸</p>
    <p><strong>Длительность:</strong> {{ $item['duration'] }} мин</p>

    <p>
        <a href="{{ route('services.index') }}">← Назад к списку</a>
    </p>
@endsection
