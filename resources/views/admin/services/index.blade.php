@extends('layouts.admin')

@section('title', 'Услуги')

@section('content')
    <h1>Все услуги</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('admin.services.create') }}">+ Добавить услугу</a></p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Мастер</th>
                <th>Доступна</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->price }} ₸</td>
                    <td>{{ $item->master->name ?? '—' }}</td>
                    <td>{{ $item->is_available ? 'Да' : 'Нет' }}</td>
                    <td>
                        <a href="{{ route('admin.services.edit', $item) }}">Изменить</a>

                        <form action="{{ route('admin.services.destroy', $item) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Удалить?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $items->links() }}
@endsection