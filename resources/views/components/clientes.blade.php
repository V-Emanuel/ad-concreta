<div id="searchResults" class="appointments-list">
    <p>Clientes
        <span class="appointments-search">
            <x-search-icon />
            <input type="text" id="searchInput" placeholder="Pesquisar por nome">

        </span>
    </p>
    <ul class="appointments-ul">
        @foreach ($clientes as $cliente)
        <a class="searchable-li"  href="{{ route('clienteId', ['id' => $cliente->id]) }}"
            data-ramo="{{ $cliente->ramoId }}" data-data="{{ $cliente->created_at }}">
            <h1 class="searchable-content">{{ $cliente->nome }}</h1>
            <h3>{{ $cliente->updated_at->format('d / m / Y - H:i') }}</h3>
        </a>
        @endforeach
    </ul>
</div>
