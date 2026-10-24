@extends('layouts.app')

@section('title', 'Услуги и цены - Барбершоп')

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-amber-500">Наши Услуги</h1>

    <form method="GET" action="{{ route('services.index') }}" class="mb-8 flex gap-4">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Поиск услуги..." class="bg-gray-800 border border-gray-700 px-4 py-2 rounded w-1/3 text-white">
        <button type="submit" class="bg-amber-500 text-black px-6 py-2 rounded font-bold hover:bg-amber-400">Найти</button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($services as $service)
            <div class="bg-gray-800 border border-gray-700 rounded-lg p-5 flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-bold text-amber-400">{{ $service->title }}</h2>
                    <p class="text-gray-400 text-sm mt-2">{{ Str::limit($service->description, 80) }}</p>
                    @if($service->master)
                        <p class="text-xs text-gray-500 mt-2">Мастер: {{ $service->master->name }}</p>
                    @endif
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-lg font-bold text-white">{{ $service->price }} ₸</span>
                    <a href="{{ route('services.show', $service) }}" class="text-amber-500 underline hover:text-amber-400">Подробнее</a>
                </div>
            </div>
        @empty
            <p class="text-gray-400 col-span-3">Услуги не найдены.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $services->links() }}
    </div>
</div>
@endsection