<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>О проекте - {{ config('app.name') }}</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Главная</a> | 
        <a href="{{ route('about') }}">О проекте</a> | 
        <a href="{{ route('contacts') }}">Контакты</a>
    </nav>
    <h1>О проекте «Барбершоп»</h1>
    <p>Студент: {{ $fio }} (группа {{ $group }})</p>
    <p>Наш барбершоп — это современное пространство для стильных мужчин. Мы предлагаем премиальный уход, классические стрижки и профессиональное бритье.</p>
</body>
</html>