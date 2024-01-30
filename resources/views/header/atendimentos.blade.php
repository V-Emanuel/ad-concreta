<x-app-layout>
    <div class="appointments-content">
        <ul class="appointments-column">
            <li><x-user-icon /> Novo Registro</li>
            <li><x-list-icon /> Atendimentos</li>
            <li><x-register-icon /> Meus Registros</li>
        </ul>
        <div class="appointments-options">
            <!-- <x-form-atendimento/> -->
            <x-atendimentos />
        </div>
        <div class="appointments-filter">

        </div>
    </div>
</x-app-layout>