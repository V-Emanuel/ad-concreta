<x-guest-layout>

    <div class="auth-container">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="auth-left-content">
            <div class="vinicius-svg">
                <x-viniciusguimaraes />
            </div>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <p>Faça seu Login</p>

            <div class="vg-svg">
                <x-vg />
            </div>
            <label for="email" :value="__('Email')">
                Email:
            </label>
            <input class="login-input" id="email" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <label for="password" :value="__('Password')">
                Senha:
            </label>
            <input class="login-input" id="password" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <label class="remember-container" for="remember_me">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span>{{ __('Remember me') }}</span>
            </label>
            <div class="auth-button-container">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <button type="submit">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>

</x-guest-layout>