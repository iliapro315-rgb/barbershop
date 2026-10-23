@extends('layouts.admin')

@section('title', 'Добавить услугу')

@section('content')
    <h1>Добавить услугу</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf

        <p>
            <label>Название</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title') <span style="color:red">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>Описание</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </p>

        <p>
            <label>Цена (₸)</label><br>
            <input type="number" name="price" value="{{ old('price') }}">
            @error('price') <span style="color:red">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>Длительность (мин)</label><br>
            <input type="number" name="duration" value="{{ old('duration', 30) }}">
            @error('duration') <span style="color:red">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>Мастер</label><br>
            <select name="master_id">
                <option value="">— выберите —</option>
                @foreach ($masters as $master)
                    <option value="{{ $master->id }}" @selected(old('master_id') == $master->id)>
                        {{ $master->name }}
                    </option>
                @endforeach
            </select>
            @error('master_id') <span style="color:red">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>
                <input type="checkbox" name="is_available" value="1" @checked(old('is_available', true))>
                Доступна
            </label>
        </p>

        <button type="submit">Сохранить</button>
        <a href="{{ route('admin.services.index') }}">Отмена</a>
    </form>
@endsection