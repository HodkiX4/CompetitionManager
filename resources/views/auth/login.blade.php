@vite('resources/js/auth.js')

<x-layout>
    <form class="auth-form" onsubmit="login(event)">
        @csrf
        <h2>Jelentkezz be</h2>

        <div class="input-container">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail-icon lucide-mail"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Email"
                required
            >
        </div>
        <div class="input-container">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-icon lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <input
                type="password"
                name="password"
                placeholder="Jelszó"
                required
            >
        </div>

        <button type="submit">Bejelentkezés</button>
    </form>
</x-layout>