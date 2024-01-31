<div id="searchResults" class="appointments-list">
    <p>Clientes
        <span class="appointments-search">
            <x-search-icon />
            <input type="text" id="searchInput" placeholder="Pesquisar por nome">

        </span>
    </p>
    <ul class="appointments-ul">
        @foreach ($clientes as $cliente)
        <li class="searchable-li" id="moreContent{{ $loop->index }}" data-cidade="{{ $cliente->cidadeId }}"
            data-ramo="{{ $cliente->ramoId }}" data-data="{{ $cliente->created_at }}">
            <h1 class="searchable-content">{{ $cliente->nome }}</h1>
            <div class="appointment-info invisible-appointment-info">
                <div class="appointment-data">
                    <h2>
                        Informações:
                    </h2>
                    @foreach($cidades as $cidade)
                    @if($cidade->id === $cliente->cidadeId)
                    <h4> <strong>Cidade/Povoado: </strong> {{ $cidade->nome }}</h4>
                    @endif
                    @endforeach
                    @foreach($ramos as $ramo)
                    @if($ramo->id === $cliente->ramoId)
                    <h4> <strong>Tipo Jurídico: </strong> {{ $ramo->nome }}</h4>
                    @endif
                    @endforeach
                    <h4><strong>Cel:</strong> {{ $cliente->celular }}</h4>
                </div>
                <h5 class="appointment-text">
                    {{ $cliente->texto}}
                </h5>
            </div>
            <h3>{{ $cliente->updated_at->format('d / m / Y - H:i') }}</h3>
        </li>
        @endforeach
    </ul>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        var lis = document.querySelectorAll('.searchable-li');

        lis.forEach(function (li) {
            li.addEventListener('click', function () {
                var appointmentInfo = this.querySelector('.appointment-info');
                appointmentInfo.classList.toggle('visible-appointment-info');
                appointmentInfo.classList.toggle('invisible-appointment-info');
            });
        });
    });

</script>