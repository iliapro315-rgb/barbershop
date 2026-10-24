<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Барбершоп')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen flex flex-col justify-between">
    @include('partials.nav')

    <main class="container mx-auto px-4 py-8 flex-1">
        @if(session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>