<form class="create-atendimento-component" id="cadastroForm" method="POST">
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
        <button type="button" id="btnCadastrar">
            <p>REGISTRAR</p>
        </button>
    </div>
    <span class="vg-icon">
        <x-vg />
    </span>

</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
    $(document).ready(function () {
        $('#celular').inputmask('(99) 99999-9999', { placeholder: ' ' });

        $('#btnCadastrar').click(function () {
            $.ajax({
                type: 'POST',
                url: '{{ route("atendimento.post") }}',
                data: $('#cadastroForm').serialize(),
                success: function () {
                    alert('Cadastro realizado com sucesso!');
                    $('#cadastroForm')[0].reset();
                },
                error: function () {
                    alert('Ocorreu um erro durante o cadastro.');
                }
            });
        });
    });
</script>