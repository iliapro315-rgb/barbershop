@extends('layouts.admin')

@section('title', 'Редактировать услугу')

@section('content')
    <h1>Редактировать: {{ $service->title }}</h1>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Название</label><br>
            <input type="text" name="title" value="{{ old('title', $service->title) }}">
            @error('title') <span style="color:red">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>Описание</label><br>
            <textarea name="description">{{ old('description', $service->description) }}</textarea>
        </p>

        <p>
            <label>Цена (₸)</label><br>
            <input type="number" name="price" value="{{ old('price', $service->price) }}">
            @error('price') <span style="color:red">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>Длительность (мин)</label><br>
            <input type="number" name="duration" value="{{ old('duration', $service->duration) }}">
            @error('duration') <span style="color:red">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>Мастер</label><br>
            <select name="master_id">
                @foreach ($masters as $master)
                    <option value="{{ $master->id }}"
                        @selected(old('master_id', $service->master_id) == $master->id)>
                        {{ $master->name }}
                    </option>
                @endforeach
            </select>
            @error('master_id') <span style="color:red">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>
                <input type="checkbox" name="is_available" value="1"
                    @checked(old('is_available', $service->is_available))>
                Доступна
            </label>
        </p>

        <button type="submit">Обновить</button>
        <a href="{{ route('admin.services.index') }}">Отмена</a>
    </form>
@endsection