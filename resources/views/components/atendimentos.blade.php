<ul id="searchResults">
    @foreach ($atendimentos as $atendimento)
    <li class="searchable-li" id="moreContent{{ $loop->index }}" data-cidade="{{ $atendimento->cidadeId }}"
        data-ramo="{{ $atendimento->ramoId }}" data-data="{{ $atendimento->created_at }}">
        <h1 class="searchable-content">{{ $atendimento->nome }}</h1>
        @foreach($cidades as $cidade)
        @if($cidade->id === $atendimento->cidadeId)
        <h2>{{ $cidade->nome }}</h2>
        @endif
        @endforeach
        @foreach($ramos as $ramo)
        @if($ramo->id === $atendimento->ramoId)
        <h2>({{ $ramo->nome }})</h2>
        @endif
        @endforeach
        <span></span>
        <h3>{{ $atendimento->updated_at->format('d / m / Y - H:i') }}</h3>
        <div class="appointment-icon">+</div>
        <p class="no-active-register-content">{{ $atendimento->texto}}</p>
    </li>
    @endforeach
</ul>