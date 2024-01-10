<form class="create-cliente-component" id="cadastroForm" method="POST" action="{{ route('cliente.post') }}">
    @csrf
    <div class="form-inputs-container">
        <label>Nome:<span style="color: red"> *</span></label>
        <input placeholder="Nome" name="nome" required type="text">
        <label>Situação:<span style="color: red"> *</span></label>
        <input placeholder="Situação" name="situacao" required type="text">
        <label>Naturalidade:<span style="color: red"> *</span></label>
        <select id="naturalidade" name="naturalidade" onchange="atualizarEstadoCivil(); ocultarCampoOutro()">
            <option id="brasileiro" value="brasileiro">brasileiro</option>
            <option id="brasileira" value="brasileira">brasileira</option>
            <option value="outro">Outro</option>
        </select>
        <div id="campoOutro" style="display: none;">
            <label for="outro">Digite a opção:</label>
            <input type="text" id="outroCampo" name="outroCampo">
        </div>
        <label>Estado Civil:<span style="color: red"> *</span></label>
        <select id="estado_civil" name="estado_civil">
        </select>
        <label>Profissão:<span style="color: red"> *</span></label>
        <input placeholder="Profissão" name="profissao" required type="text">
        <label>Nome da Mãe:<span style="color: red"> *</span></label>
        <input placeholder="Mãe" name="nome_mae" required type="text">
        <label>Nome do Pai: </label>
        <input placeholder="Pai" name="nome_pai" required type="text">
        <label>RG:<span style="color: red"> *</span></label>
        <input placeholder="99.999.999-99" id="rg" name="rg" required type="text">
        <label>CPF:<span style="color: red"> *</span></label>
        <input placeholder="999.999.999-99" id="cpf" name="cpf" required type="text">
        <label>Celular:</label>
        <input type="text" id="celular" name="celular" placeholder="(99) 99999-9999">
        <label>Cidade de Nascimento:<span style="color: red"> *</span></label>
        <input placeholder="Cidade" name="cidade_nascimento" required type="text">
        <label>Estado de Nascimento:<span style="color: red"> *</span></label>
        <input placeholder="Estado" name="estado_nascimento" required type="text">
        <label>Data de Nascimento:<span style="color: red"> *</span></label>
        <input placeholder="99/99/9999" id="nascimento" name="nascimento" required type="text">
        <label class="label-endereco">Endereço:<span style="color: red"> *</span></label>
        <div class="cliente-endereco-container">
            <div class="endereco-section primeiro">
                <h6>CEP:<span style="color: red"> *</span></h6>
                <input id="cep" placeholder="CEP" name="cep" required type="text">
            </div>
            <div class="endereco-section segundo">
                <h6>Rua:<span style="color: red"> *</span></h6>
                <input id="logradouro" placeholder="Rua" name="rua" required type="text">
            </div>
            <div class="endereco-section terceiro">
                <h6>Bairro:<span style="color: red"> *</span></h6>
                <input id="bairro" name="bairro" required type="text">
            </div>
            <div class="endereco-section quarto">
                <h6>Número:<span style="color: red"> *</span></h6>
                <input id="numero" name="numero" required type="text">
            </div>
            <div class="endereco-section quinto">
                <h6>Estado:<span style="color: red"> *</span></h6>
                <input id="estado" name="estado" required type="text">
            </div>
            <div class="endereco-section sexto">
                <h6>Cidade:<span style="color: red"> *</span></h6>
                <input id="cidade" name="cidade" required type="text">
            </div>
        </div>
    </div>


    <button type="submit" id="btnCadastrarCliente" onclick="exibirDados()">
        <p>CADASTRAR</p>
    </button>

</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
    $(document).ready(function () {
        $('#celular').inputmask('(99) 99999-9999', { placeholder: ' ' });
        $('#rg').inputmask('99.999.999-99', { placeholder: ' ' });
        $('#cpf').inputmask('999.999.999-99', { placeholder: ' ' });
        $('#nascimento').inputmask('99/99/9999', { placeholder: ' ' });

    });

    function atualizarEstadoCivil() {

        let estadoCivilSelect = document.getElementById('estado_civil');
        estadoCivilSelect.innerHTML = '';

        let naturalidadeSelect = document.getElementById('naturalidade');
        let naturalidadeValue = naturalidadeSelect.value;

        if (naturalidadeValue === 'brasileiro') {
            adicionarOpcao('solteiro', 'solteiro');
            adicionarOpcao('casado', 'casado');
            adicionarOpcao('divorciado', 'divorciado');
            adicionarOpcao('viuvo', 'viúvo');
        } else if (naturalidadeValue === 'brasileira') {
            adicionarOpcao('solteira', 'solteira');
            adicionarOpcao('casada', 'casada');
            adicionarOpcao('divorciada', 'divorciada');
            adicionarOpcao('viuva', 'viúva');
        } else if (naturalidadeValue === 'outro') {
            mostrarCampoOutro();
            adicionarOpcao('solteiro(a)', 'solteiro(a)');
            adicionarOpcao('casado(a)', 'casado(a)');
            adicionarOpcao('divorciado(a)', 'divorciado(a)');
            adicionarOpcao('viuvo(a)', 'viúvo(a)');
        }

    }

    function adicionarOpcao(value, text) {
        let option = document.createElement('option');
        option.value = value;
        option.text = text;
        document.getElementById('estado_civil').appendChild(option);
    }

    function mostrarCampoOutro() {
        let select = document.getElementById('naturalidade');
        let campoOutro = document.getElementById('campoOutro');

        campoOutro.style.display = select.value === 'outro' ? 'block' : 'none';

        if (select.value !== 'outro') {
            document.getElementById('outroCampo').value = '';
        }
    }

    function ocultarCampoOutro() {
        var select = document.getElementById('naturalidade');
        var campoOutro = document.getElementById('campoOutro');

        if (select.value === 'brasileiro' || select.value === 'brasileira') {
            campoOutro.style.display = 'none';
            document.getElementById('outroCampo').value = '';
        } else {
            campoOutro.style.display = 'block';
        }
    } atualizarEstadoCivil();

    $("#cep").focusout(function () {
        $.ajax({

            url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/',
            dataType: 'json',
            success: function (resposta) {

                $("#logradouro").val(resposta.logradouro);
                $("#numero").val(resposta.complemento);
                $("#bairro").val(resposta.bairro);
                $("#cidade").val(resposta.localidade);
                $("#estado").val(resposta.uf);
                $("#cep").val(resposta.cep);
                $("#numero").focus();
            }
        });

    });

</script>