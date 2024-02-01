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
            <h5><strong>RG: </strong>{{$cliente->rg}}</h5>
            <h5><strong>CPF: </strong>{{$cliente->cpf}}</h5>
            <h5><strong>Nome da Mãe: </strong>{{$cliente->nome_mae}}</h5>
            <h5><strong>Nome do Pai: </strong>{{$cliente->nome_pai}}</h5>
            <h5><strong>Esdado Civil: </strong>{{$cliente->estado_civil}}</h5>
            <h5><strong>Naturalidade: </strong>{{$cliente->naturalidade}}</h5>
            <h5><strong>Celular: </strong>{{$cliente->celular}}</h5>
            <h5><strong>Situação: </strong>{{$cliente->situacao}}</h5>
            <h5><strong>Profissão: </strong>{{$cliente->profissao}}</h5>
            <h5><strong>Local de Nascimento: </strong>{{$cliente->cidade_nascimento}} / {{$cliente->estado_nascimento}}
            </h5>
        </div>
        <ul class="cliente-content-right">
            <h6>Documentos: </h6>
            @foreach($cliente->documentos as $docs)
            <li>
                <div>
                    <a href="{{$docs['url']}}" target="_blank">
                        @if($docs['type'] === 'pdf')
                        <x-pdf-gray />
                        @else
                        <x-image-icon />
                        @endif
                    </a>
                    <p>{{ $docs['nome'] }}</p>
                </div>
                <h6>({{$docs['descricao']}})</h6>
            </li>
            @endforeach
            <span class="add-pdf-icon">
                <x-add-pdf />
            </span>
        </ul>
    </div>
</div>

<div class="add-document-container close-add-document">
    <form method="POST" action="{{ route('cliente.doc') }}" enctype="multipart/form-data">
        @csrf
        <label for="arquivos">Selecione os documentos:</label>
        <input type="hidden" name="cliente_id" value="{{ $cliente->id }}" />
        <div class="input-files-container">
            <input class="arquivos input-files" type="file" name="arquivos[]" accept=".pdf, .png, .jpg, .jpeg" required
                multiple>
            <p>Clique aqui para adicionar os arquivos</p>
        </div>
        <div class="camposExtras"></div>
        <input class="input-button" type="submit" value="Enviar">
        <div class="close-form-document">X</div>
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

        // Adiciona um evento de mudança ao campo de entrada de arquivo
        document.querySelector('.input-files').addEventListener('change', function (event) {
            // Obtém os arquivos selecionados
            const files = event.target.files;

            // Cria campos de entrada adicionais para nome e descrição para cada arquivo
            const camposExtras = document.querySelector('.camposExtras');
            camposExtras.innerHTML = ''; // Limpa os campos extras antes de adicionar novos

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Cria campos de entrada para nome e descrição
                const nomeInput = document.createElement('input');
                nomeInput.type = 'text';
                nomeInput.name = `nomes[${i}]`; // Use um array para enviar vários nomes ao backend
                nomeInput.placeholder = 'Nome do Documento';

                const descricaoInput = document.createElement('input');
                descricaoInput.type = 'text';
                descricaoInput.name = `descricoes[${i}]`; // Use um array para enviar várias descrições ao backend
                descricaoInput.placeholder = 'Descrição do Documento';

                // Adiciona os campos ao formulário
                camposExtras.appendChild(nomeInput);
                camposExtras.appendChild(descricaoInput);
            }
        });
    });
</script>
