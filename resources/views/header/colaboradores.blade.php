<x-app-layout>
    <div class="colaboradores-content">
        <div class="colaboradores-left">
            <p>Colaboradores</p>
            <ul>
                @foreach($users as $user)
                <li class="colaborador">
                    <h1>{{$user->name}}</h1>
                    <h2>{{$user->email}}</h2>
                    <button class="delete-colaborador-button" id="delete-colaborador-button-{{$user->id}}">{{
                        __('Deletar Conta') }}
                    </button>
                </li>
                <div id="confirm-user-deletion-{{$user->id}}"
                    class="col-modal-{{$user->id}} colaborador-modal invisible-colaborador-modal">
                    <form method="post" action="{{ route('profile.destroyByAdmin') }}" class="modal-confirm-form">
                        @csrf
                        <h3 class="modal-title">Tem certeza de que deseja excluir a conta do(a) colaborador(a)
                            {{$user->name}}?</h3>
                        <h4>Depois que a conta for excluída, todos os seus recursos e dados serão excluídos
                            permanentemente.
                            Digite sua senha para confirmar que deseja excluir permanentemente essa conta.</h4>

                        <input id="password" name="password" type="password" placeholder="{{ __('Senha') }}" required />
                        <input id="password" name="userId" type="hidden" value="{{$user->id}}" />

                        <div class="colaborador-modal-buttons">
                            <button class="modal-cancel-button">Cancelar</button>
                            <button class="modal-button">Deletar</button>
                        </div>
                    </form>
                </div>
                @endforeach
            </ul>
            <div class="colaboradores-vg">
                <x-vg />
            </div>
        </div>
        <div class="colaboradores-right">
            </form>
            <form class="colaboradores-form-login" method="POST" action="{{ route('register.colaborador') }}">
                @csrf

                <p>Cadastre um Novo Colaborador!</p>

                <label>Nome:</label>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />


                <label>Email:</label>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <label>Senha: </label>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <label>Confirme a Senha:</label>

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                <button type="submit" class="ms-4">
                    {{ __('Registrar') }}
                </button>
            </form>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let buttons = document.querySelectorAll('.delete-colaborador-button');
            let cancelButtons = document.querySelectorAll('.modal-cancel-button');

            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    let idDoBotao = this.id.replace('delete-colaborador-button-', '');
                    let modal = document.querySelector('.col-modal-' + idDoBotao);
                    modal.classList.toggle('visible-colaborador-modal');
                    modal.classList.toggle('invisible-colaborador-modal');
                });
            });

            cancelButtons.forEach(function (cancelButton) {
                cancelButton.addEventListener('click', function () {
                    let modal = this.closest('.colaborador-modal');
                    modal.classList.toggle('visible-colaborador-modal');
                    modal.classList.toggle('invisible-colaborador-modal');
                });
            }       });
    </script>
</x-app-layout>