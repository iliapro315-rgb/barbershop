
@extends('layouts.app')

@section('title', 'Каталог услуг')

@section('content')
    <h1>Каталог услуг</h1>

    @forelse ($items as $id => $item)
        <div class="card">
            <strong>{{ $loop->iteration }}.</strong>

            <a href="{{ route('services.show', $id) }}">
                {{ $item['title'] }}
            </a>

            — {{ $item['price'] }} ₸

            <p>{{ $item['description'] }}</p>
            <p>Длительность: {{ $item['duration'] }} мин.</p>

            @if ($item['price'] > 3000)
                <span>Премиум</span>
            @endif
        </div>
    @empty
        <p>Услуги пока не добавлены.</p>
    @endforelse
@endsection
