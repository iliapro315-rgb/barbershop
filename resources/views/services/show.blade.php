
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $item['title'] }}</title>
</head>
<body>
    <h1>{{ $item['title'] }}</h1>

    <p>{{ $item['description'] }}</p>
    <p>Цена: {{ $item['price'] }} ₸</p>
    <p>Длительность: {{ $item['duration'] }} минут</p>

    <a href="{{ route('services.index') }}">Назад к услугам</a>
</body>
</html>
