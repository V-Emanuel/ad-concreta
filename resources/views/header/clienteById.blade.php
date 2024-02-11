<x-app-layout>
    <div class="clients-content">
        <ul class="clients-column">
            <button onclick="mostrarComponente('info')"><x-user-icon /> Cliente</button>
            <button onclick="mostrarComponente('observacoes')"><x-list-icon /> Observações</button>
            <button onclick="mostrarComponente('documentos')"><x-list-icon /> Gerar Documentos</button>

        </ul>

        <div id="client-info" class="clients-options">
            <x-cliente-page :cliente="$cliente" />
        </div>
        <div id="client-observacoes" style="display: none;" class="clients-options">
            <x-client-obs :cliente="$cliente"/>
        </div>
        <div id="client-documentos" style="display: none;" class="clients-options">
            
            </div>

        <div class="clients-filter" style="display: none;">

        </div>
    </div>

    <script>

        function mostrarComponente(componenteId) {

            let filter = document.querySelector('.clients-filter');

            let todosComponentes = document.querySelectorAll('.clients-options');
            todosComponentes.forEach(function (componente) {
                componente.style.display = 'none';
            });

            if (componenteId === "info") {
                filter.style.display = 'none';
            } else {
                filter.style.display = 'flex';
            }

            let componenteSelecionado = document.getElementById('client-' + componenteId);
            if (componenteSelecionado) {
                componenteSelecionado.style.display = 'flex';
            }
        }

    </script>
</x-app-layout>