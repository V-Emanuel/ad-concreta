<x-app-layout>
    <div class="clients-content">
        <ul class="clients-column">
            <button onclick="mostrarComponente('atendimentos')"><x-list-icon /> Clientes</button>
            <button onclick="mostrarComponente('form')"><x-user-icon /> Novo Cliente</button>
        </ul>

        <div id="clients-form" style="display: none;" class="clients-options">
            <x-form-cliente />
        </div>

        <div id="clients-atendimentos" class="clients-options">
            <x-clientes />
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

            if (componenteId === "form") {
                filter.style.display = 'none';
            } else {
                filter.style.display = 'flex';
            }

            let componenteSelecionado = document.getElementById('clients-' + componenteId);
            if (componenteSelecionado) {
                componenteSelecionado.style.display = 'flex';
            }
        }

        document.getElementById('searchInput').addEventListener('input', function () {

            let searchTerm = this.value.toLowerCase();

            let searchResults = document.getElementById('searchResults');
            let items = searchResults.getElementsByClassName('searchable-li');
            let names = searchResults.getElementsByClassName('searchable-content');

            for (let i = 0; i < items.length; i++) {
                let name = names[i];
                let item = items[i]
                let textContent = name.textContent || name.innerText;

                if (textContent.toLowerCase().includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('.checkbox-cidade').forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    filterAtendimentos();
                });
            });

            document.querySelectorAll('.checkbox-ramo').forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    filterAtendimentos();
                });
            });

            document.getElementById('startDate').addEventListener('change', function () {
                filterAtendimentos();
            });

            document.getElementById('endDate').addEventListener('change', function () {
                filterAtendimentos();
            });

            function filterAtendimentos() {
                let cidadesSelecionadas = Array.from(document.querySelectorAll('.checkbox-cidade:checked')).map(checkbox => checkbox.dataset.cidade);
                let ramosSelecionados = Array.from(document.querySelectorAll('.checkbox-ramo:checked')).map(checkbox => checkbox.dataset.ramo);
                let startDate = document.getElementById('startDate').value;
                let endDate = document.getElementById('endDate').value;

                let atendimentos = document.getElementsByClassName('searchable-li');

                for (let i = 0; i < atendimentos.length; i++) {
                    let atendimento = atendimentos[i];
                    let cidadeAtendimento = atendimento.dataset.cidade;
                    let ramoAtendimento = atendimento.dataset.ramo;
                    let dataAtendimento = atendimento.dataset.data;

                    let cidadeFiltrada = cidadesSelecionadas.length === 0 || cidadesSelecionadas.includes(cidadeAtendimento);
                    let ramoFiltrado = ramosSelecionados.length === 0 || ramosSelecionados.includes(ramoAtendimento);
                    let dataFiltrada = (startDate === '' || dataAtendimento >= startDate) && (endDate === '' || dataAtendimento <= endDate);

                    atendimento.style.display = cidadeFiltrada && ramoFiltrado && dataFiltrada ? 'block' : 'none';
                }
            }
        });

    </script>
</x-app-layout>