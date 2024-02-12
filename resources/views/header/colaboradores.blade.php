<x-app-layout>
    <div class="colaboradores-content">
        <div class="colaboradores-left">
            <p>Colaboradores</p>
            <ul>
                @foreach($users as $user)
                <li class="colaborador">
                    <h1>{{$user->name}}</h1>
                    <h2>{{$user->email}}</h2>
                    <button x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion-{{$user->id}}')">{{
                        __('Deletar Conta') }}
                    </button>
                    <div id="confirm-user-deletion-{{$user->id}}" class="colaborador-modal" style="display: none;">
                        <form method="post" action="{{ route('profile.destroyByAdmin') }}" class="modal-confirm-form">
                            @csrf
                            @method('delete')
                            <h3>Tem certeza de que deseja excluir a conta do(a) colaborador(a) {{$user->name}}?</h3>
                            <h4>Depois que a conta for excluída, todos os seus recursos e dados serão excluídos
                                permanentemente.
                                Digite sua senha para confirmar que deseja excluir permanentemente sua conta.</h4>

                            <input id="password" name="password" type="password" placeholder="{{ __('Senha') }}" />

                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />

                            <div class="colaborador-modal-buttons">
                                <button>Cancelar</button>
                                <button>Deletar</button>
                            </div>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="colaboradores-vg">
                <x-vg />
            </div>
        </div>
        <div class="colaboradores-right"></div>
    </div>
</x-app-layout>
