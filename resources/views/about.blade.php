@extends('layouts.app')

@section('title', 'О проекте')

@section('content')
<div class="bg-gray-800 border border-gray-700 rounded-lg p-6 max-w-2xl mx-auto text-gray-100">
    <h1 class="text-3xl font-bold text-amber-500 mb-4">О проекте</h1>
    
    <p class="mb-2"><strong>ФИО:</strong> {{ $fio ?? 'Иванов Иван Иванович' }}</p>
    <p class="mb-4"><strong>Группа:</strong> {{ $group ?? 'ПО-31' }}</p>
    
    <p class="text-gray-300 mb-2">Учебный проект «Барбершоп» — каталог услуг и мастеров.</p>
    <p class="text-gray-300">Здесь можно посмотреть список услуг, карточки и записаться к мастеру.</p>

    <div class="mt-6">
        <a href="{{ route('home') }}" class="bg-amber-500 text-black px-4 py-2 rounded font-bold hover:bg-amber-400">На главную</a>
    </div>
</div>
@endsection