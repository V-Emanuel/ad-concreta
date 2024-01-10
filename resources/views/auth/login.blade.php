<x-guest-layout>

    <div class="auth-container">
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="auth-left-content">
            <div class="vinicius-svg">
                <x-vgnome />
            </div>
            <h1>ADVOGADOS ASSOCIADOS</h1>
        </div>

        <div class="auth-right-content">
            <form class="show-form auth-form-login" method="POST" action="{{ route('login') }}">
                @csrf

                <p>Faça seu Login</p>

                <div class="vg-svg">
                    <x-vg />
                </div>
                <label for="email" :value="__('Email')">
                    Email:
                </label>
                <input class="auth-input" id="email" type="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <label for="password" :value="__('Password')">
                    Senha:
                </label>
                <input class="auth-input" id="password" type="password" name="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <label class="remember-container" for="remember_me">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>
                <div class="auth-button-container">

                    <a class="change-auth">
                        {{ __('Esqueceu sua senha?') }}
                    </a>

                    <button type="submit">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
            <form class="hide-form auth-form-reset" method="POST" action="{{ route('password.email') }}">
                @csrf

                <p>Esqueceu sua senha?</p>
                <h2>Não se preocupe, enviaremos instruções <br /> para o seu email.</h2>
                <div class="vg-svg">
                    <x-vg />
                </div>
                <label for="email" :value="__('Email')">
                    Email:
                </label>
                <input id="email" class="auth-input" type="email" name="email" :value="old('email')" required
                    autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />


                <div class="auth-button-container">
                    <button type="submit">
                        {{ __('Redefinir Senha') }}
                    </button>
                </div>

                <h4 class="change-auth-back">
                    {{ __('↩ Voltar para o login') }}
                </h4>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            var formLogin = document.querySelector('.auth-form-login');
            var formReset = document.querySelector('.auth-form-reset');
            var changeToResetLink = document.querySelector('.change-auth');
            var changeToLoginLink = document.querySelector('.change-auth-back');

            changeToResetLink.addEventListener('click', function (event) {
                event.preventDefault();
                formLogin.classList.toggle('show-form');
                formLogin.classList.toggle('hide-form');
                formReset.classList.toggle('show-form');
                formReset.classList.toggle('hide-form');
            });

            changeToLoginLink.addEventListener('click', function (event) {
                event.preventDefault();
                formLogin.classList.toggle('show-form');
                formLogin.classList.toggle('hide-form');
                formReset.classList.toggle('show-form');
                formReset.classList.toggle('hide-form');
            });

        });
    </script>

</x-guest-layout>