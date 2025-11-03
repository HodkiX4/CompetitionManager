<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite('resources/css/app.css')
</head>
<body>
    <header>
        <h1>Verseny kezelő</h1>
        <nav>
            @guest
                <a href="{{ route('') }}">Bejelentkezés</a>
                <a href="{{ route('') }}">Regisztráció</a>
            @endguest
            @auth
                <span>
                    Üdv, {{ Auth::user()->name }}
                    <form action="">
                        @csrf
                        <button>Kijelentkezés</button>
                    </form>
                </span>
                
            @endauth
        </nav>
    </header>
</body>
</html>