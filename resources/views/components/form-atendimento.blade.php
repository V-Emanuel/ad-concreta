<form class="create-atendimento-component" method="POST" action="{{ route('atendimento.post') }}">
    @csrf
    <h6>Novo Registro</h6>
    <label>Nome:<span style="color: red"> *</span></label>
    <input placeholder="Nome" name="nome" required type="text">
    <label>Cidade:<span style="color: red"> *</span></label>
    <select name="cidadeId">
        @foreach($cidades as $cidade)
        <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
        @endforeach
    </select>
    <label>Ramo Jurídico:<span style="color: red"> *</span></label>
    <select name="ramoId">
        @foreach($ramos as $ramo)
        <option value="{{ $ramo->id }}">{{ $ramo->nome }}</option>
        @endforeach
    </select>
    <label>Celular:</label>
    <input type="text" id="celular" name="celular" placeholder="(99) 99999-9999">
    <label>Registro do Atendimento:<span style="color: red"> *</span></label>
    <input id="texto-atendimento" name="texto" placeholder="Texto" required type="text" maxlength="200">
    <div class="button-container">
        <button type="submit">
            <p>REGISTRAR</p>
        </button>
    </div>
    <span class="vg-icon">
        <x-vg />
    </span>

</form>