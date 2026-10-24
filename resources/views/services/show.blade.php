@extends('layouts.app')

@section('title', $service->title)

@section('content')
<div class="bg-gray-800 border border-gray-700 rounded-lg p-6 max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold text-amber-500 mb-4">{{ $service->title }}</h1>
    
    @if($service->description)
        <p class="text-gray-300 mb-4">{{ $service->description }}</p>
    @endif

    <div class="mb-4">
        <span class="text-xl font-bold text-amber-400">Цена: {{ $service->price }} ₸</span>
    </div>

    <div class="mb-4 text-sm text-gray-400">
        Длительность: {{ $service->duration_minutes ?? 45 }} минут
    </div>

    @if($service->master)
        <div class="text-gray-300 mb-6 bg-gray-900 p-4 rounded border border-gray-700">
            <strong class="text-amber-400">Мастер:</strong> {{ $service->master->name }} <br>
            <span class="text-sm text-gray-400">{{ $service->master->specialization }}</span>
        </div>
    @endif

    <a href="{{ route('services.index') }}" class="inline-block bg-gray-700 text-gray-200 px-4 py-2 rounded hover:bg-gray-600">
        ← Назад к списку услуг
    </a>
</div>
@endsection