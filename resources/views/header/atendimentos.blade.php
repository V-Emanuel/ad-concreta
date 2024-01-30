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
        document.addEventListener('DOMContentLoaded', function () {
            var checkboxesCidade = document.querySelectorAll('.checkbox-cidade');
            var checkboxesRamo = document.querySelectorAll('.checkbox-ramo');
            var startDateInput = document.getElementById('startDate');
            var endDateInput = document.getElementById('endDate');
            var lis = document.querySelectorAll('.searchable-li');

            function applyFilters() {
                var startDate = new Date(startDateInput.value);
                var endDate = new Date(endDateInput.value);

                lis.forEach(function (li) {
                    var cidadeId = li.getAttribute('data-cidade');
                    var ramoId = li.getAttribute('data-ramo');
                    var dataCriacao = new Date(li.getAttribute('data-data'));

                    var cidadeChecked = checkboxesCidade[cidadeId - 1].checked;
                    var ramoChecked = checkboxesRamo[ramoId - 1].checked;
                    var dateInRange = (!startDate || dataCriacao >= startDate) && (!endDate || dataCriacao <= endDate);

                    if (cidadeChecked && ramoChecked && dateInRange) {
                        li.style.display = 'block';
                    } else {
                        li.style.display = 'none';
                    }
                });
            }

            checkboxesCidade.forEach(function (checkbox) {
                checkbox.addEventListener('change', applyFilters);
            });

            checkboxesRamo.forEach(function (checkbox) {
                checkbox.addEventListener('change', applyFilters);
            });

            startDateInput.addEventListener('change', applyFilters);
            endDateInput.addEventListener('change', applyFilters);
        });
    </script>
</x-app-layout>