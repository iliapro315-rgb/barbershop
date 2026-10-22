
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление услугами</title>
</head>
<body>
    <h1>Управление услугами</h1>

    <a href="{{ route('admin.services.create') }}">Добавить услугу</a>

    <ul>
        @foreach ($items as $id => $item)
            <li>
                {{ $item['title'] }} — {{ $item['price'] }} ₸
            </li>
        @endforeach
    </ul>

    <a href="{{ route('admin.dashboard') }}">Назад в админ-панель</a>
</body>
</html>
