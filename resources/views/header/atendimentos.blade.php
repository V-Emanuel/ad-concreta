<x-app-layout>
    <div class="appointments-content">
        <ul class="appointments-column">
            <button onclick="mostrarComponente('form')"><x-user-icon /> Novo Registro</button>
            <button onclick="mostrarComponente('atendimentos')"><x-list-icon /> Atendimentos</button>
        </ul>
        <div id="appointments-form" class="appointments-options">
            <x-form-atendimento />
        </div>

        <div id="appointments-atendimentos" style="display: none;" class="appointments-options">
            <x-atendimentos />
        </div>

        <div class="appointments-filter" style="display: none;">
            <p>Filtrar Registros</p>

            <h1> Por Cidade: </h1>

            @foreach($cidades as $cidade)
            <div class="checkbox-container">
                <input type="checkbox" class="checkbox-cidade" data-cidade="{{ $cidade->id }}" />
                <h3>{{$cidade->nome}}</h3>
            </div>
            @endforeach

            <h1> Por Tipo: </h1>

            @foreach($ramos as $ramo)
            <div class="checkbox-container">
                <input type="checkbox" class="checkbox-ramo" data-ramo="{{ $ramo->id }}" />
                <h3>{{$ramo->nome}}</h3>
            </div>
            @endforeach
            <h1> Por Data: </h1>
            <div class="date-filter-container">
                <span>
                    <label for="startDate">De:</label>
                    <input type="date" id="startDate">
                </span>
                <span>
                    <label for="endDate">Até:</label>
                    <input type="date" id="endDate">
                </span>
            </div>
        </div>
    </div>

    <script>

        function mostrarComponente(componenteId) {

            let filter = document.querySelector('.appointments-filter');

            let todosComponentes = document.querySelectorAll('.appointments-options');
            todosComponentes.forEach(function (componente) {
                componente.style.display = 'none';
            });

            if (componenteId === "form") {
                filter.style.display = 'none';
            } else {
                filter.style.display = 'flex';
            }

            let componenteSelecionado = document.getElementById('appointments-' + componenteId);
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