<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://unpkg.com/lucide@latest"></script>
        @vite('resources/css/app.css')
        @vite('resources/js/auth.js')
        @vite('resources/js/competitions.js')
        @vite('resources/js/modals.js')
</head>
<body>
    <header class="app-header">
        <div class="title">
            <h1 class="">Verseny <span>kezelő</span></h1>
        </div>
        <nav class="navbar">
            @guest
                <a class="{{ request()->routeIs('show.login') ? 'active' : '' }}" href="{{ route('show.login') }}">Bejelentkezés</a>
                <a class="{{ request()->routeIs('show.register') ? 'active' : '' }}" href="{{ route('show.register') }}">Regisztráció</a>
            @endguest
            @auth
                <span>
                    Üdv, {{ Auth::user()->name }}
                </span>       
                <form onsubmit="logout(event)">
                    @csrf
                    <button class="nav-link" type="submit">Kijelentkezés</button>
                </form>
                <button id="open-create-btn" onclick="addCreateModal()">Létrehozás</button>
            @endauth
        </nav>
    </header>

    <main id="layout">
        {{ $slot }}
    </main>
</body>
</html>