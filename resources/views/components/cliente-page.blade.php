<div class="cliente-page ">
    <header>
        <div class="cliente-foto">
            <x-person-icon />
        </div>
        <p class="cliente-nome">{{$cliente->nome}}</p>
    </header>
    <div class="cliente-content">
        <div class="cliente-content-left">
            <h6>Informaçoes: </h6>
            <div class="cliente-info-list">
                <h5><strong>RG: </strong>{{$cliente->rg}}</h5>
                <h5><strong>CPF: </strong>{{$cliente->cpf}}</h5>
                <h5><strong>Nome da Mãe: </strong>{{$cliente->nome_mae}}</h5>
                <h5><strong>Nome do Pai: </strong>{{$cliente->nome_pai}}</h5>
                <h5><strong>Esdado Civil: </strong>{{$cliente->estado_civil}}</h5>
                <h5><strong>Naturalidade: </strong>{{$cliente->naturalidade}}</h5>
                <h5><strong>Celular: </strong>{{$cliente->celular}}</h5>
                <h5><strong>Profissão: </strong>{{$cliente->profissao}}</h5>
                <h5><strong>Local de Nascimento: </strong>{{$cliente->cidade_nascimento}} /
                    {{$cliente->estado_nascimento}}</h5>
                <h5><strong>Situação: </strong>{{$cliente->situacao}}</h5>

            </div>
        </div>
        <div class="cliente-content-right">
            <h6>Documentos: </h6>
            <ul class="list-documents">
                @foreach($cliente->documentos as $docs)
                <a href="{{$docs['url']}}" target="_blank">
                    <div>
                        <div class="type-document-icon">
                            @if($docs['type'] === 'pdf')
                            <x-pdf-gray />
                            @else
                            <x-image-icon />
                            @endif
                        </div>
                        <p>{{ $docs['nome'] }}</p>
                    </div>
                    <h4>{{$docs['descricao']}}</h4>
                </a>
                @endforeach
            </ul>
        </div>
        <span class="add-pdf-icon">
            <x-add-pdf />
        </span>
    </div>
</div>

<div class="add-document-container close-add-document">
    <form method="POST" action="{{ route('cliente.doc') }}" enctype="multipart/form-data">
        @csrf
        <label for="arquivos">Selecione os documentos:</label>
        <input type="hidden" name="cliente_id" value="{{ $cliente->id }}" />
        <input type="hidden" name="cliente_nome" value="{{$cliente->nome}}"/>
        <div class="input-files-container">
            <input class="arquivos input-files" type="file" name="arquivos[]" accept=".pdf, .png, .jpg, .jpeg" required
                multiple>
            <p>Clique aqui para adicionar os arquivos</p>
        </div>
        <div class="camposExtras"></div>
        <input class="input-button" type="submit" value="Enviar">
        <div class="close-form-document">✘</div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.add-pdf-icon').forEach(function (icon) {
            icon.addEventListener('click', function () {
                let addDocument = document.querySelector('.add-document-container');
                addDocument.classList.toggle('open-add-document');
                addDocument.classList.toggle('close-add-document');
            });
        });

        document.querySelectorAll('.close-form-document').forEach(function (icon) {
            icon.addEventListener('click', function () {
                let addDocument = document.querySelector('.add-document-container');
                addDocument.classList.toggle('open-add-document');
                addDocument.classList.toggle('close-add-document');
            });
        });

        document.querySelector('.input-files').addEventListener('change', function (event) {
            const files = event.target.files;
            const camposExtras = document.querySelector('.camposExtras');
            camposExtras.innerHTML = '';

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                const nomeInput = document.createElement('input');
                nomeInput.type = 'text';
                nomeInput.name = `nomes[${i}]`;
                nomeInput.placeholder = 'Nome do Documento';
                nomeInput.value = file.name;
                nomeInput.required = true;
                nomeInput.maxLength = 50;

                const descricaoInput = document.createElement('input');
                descricaoInput.type = 'text';
                descricaoInput.name = `descricoes[${i}]`;
                descricaoInput.placeholder = 'Descrição do Documento';
                descricaoInput.required = true;
                descricaoInput.maxLength = 150;

                camposExtras.appendChild(nomeInput);
                camposExtras.appendChild(descricaoInput);
            }
        });

    });
</script>