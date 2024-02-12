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
                <div id="confirm-user-deletion-{{$user->id}}" class="col-modal-{{$user->id}} colaborador-modal invisible-colaborador-modal">
                        <form method="post" action="{{ route('profile.destroyByAdmin') }}" class="modal-confirm-form">
                            @csrf
                            @method('delete')
                            <h3 class="modal-title">Tem certeza de que deseja excluir a conta do(a) colaborador(a) {{$user->name}}?</h3>
                            <h4>Depois que a conta for excluída, todos os seus recursos e dados serão excluídos
                                permanentemente.
                                Digite sua senha para confirmar que deseja excluir permanentemente essa conta.</h4>

                            <input id="password" name="password" type="password" placeholder="{{ __('Senha') }}" required/>

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
        <div class="colaboradores-right"></div>
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
            });
        });
    </script>
</x-app-layout>