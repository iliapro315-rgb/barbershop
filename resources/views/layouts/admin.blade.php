<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Админка') — {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
</head>
<body>
    <nav class="menu">
        <a href="{{ route('admin.dashboard') }}">Панель</a>
        <a href="{{ route('admin.services.index') }}">Услуги</a>
        <a href="{{ route('admin.services.create') }}">Добавить</a>
        <a href="{{ route('admin.logout') }}">Выйти</a>
        <a href="{{ route('home') }}">На сайт</a>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>