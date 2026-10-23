<nav class="menu">
    <a href="{{ route('home') }}"
       @class(['active' => request()->routeIs('home')])>
        Главная
    </a>

    <a href="{{ route('services.index') }}"
       @class(['active' => request()->routeIs('services.*')])>
        Услуги
    </a>

    <a href="{{ route('about') }}"
       @class(['active' => request()->routeIs('about')])>
        О проекте
    </a>

    <a href="{{ route('contacts') }}"
       @class(['active' => request()->routeIs('contacts')])>
        Контакты
    </a>

    <a href="{{ route('rules') }}"
       @class(['active' => request()->routeIs('rules')])>
        Правила
    </a>
</nav>