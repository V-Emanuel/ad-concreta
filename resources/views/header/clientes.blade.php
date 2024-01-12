<x-app-layout>
    <div class="clients-content">
        <header class="clients-header">
            <p>Clientes</p>
            <input type="text" id="searchInput" placeholder="Pesquisar por nome...">
            <div class="add-client-icon">+</div>
        </header>
        <div class="no-active-x clients-right">
            <div class="close-client-icon">➠</div>
            <p class='form-title'>Registrar Cliente</p>
            <x-form-cliente />
        </div>
        <div class="no-active-opacity client-opacity-bg"></div>
        <div class="all-clients" id="searchClients">
            @foreach($clientes as $cliente)
            <div class="client-container searchable-div">
                <p class="searchable-name">{{$cliente->nome}} <span>({{$cliente->situacao}})</span></p>
                <div class="icon-container">
                    <div class="arrow-icon">➠</div>
                </div>
            </div>
            <div class="client-info searchable-info">
                <div class="client-data">
                    <div class="client-data-left">
                        <h6>Nome da Mãe: <span>{{$cliente->nome_mae}}</span></h6>
                        <h6>Nome do Pai: <span>{{$cliente->nome_pai}}</span></h6>
                        <h6>Naturalidade: <span>{{$cliente->naturalidade}}</span></h6>
                        <h6>Estado Civil: <span>{{$cliente->estado_civil}}</span></h6>
                        <h6>Profissão: <span>{{$cliente->profissao}}</span></h6>
                        <h6>RG: <span>{{$cliente->rg}}</span></h6>
                        <h6>CPF: <span>{{$cliente->cpf}}</span></h6>
                        <h6>Data de Nascimento: <span>{{$cliente->nascimento}}</span></h6>
                        <h6>Local de Nascimento: <span>{{$cliente->cidade_nascimento}} /
                                {{$cliente->estado_nascimento}}</span></h6>
                        <h6>Celular: <span>{{$cliente->celular}}</span></h6>
                    </div>
                    <div class="client-data-right">
                        <h5>Endereço:</h5>
                        <div class="adress-content">
                            <h6>CEP: <span>{{$cliente->endereco['cep']}}</span></h6>
                            <h6>Rua: <span>{{$cliente->endereco['rua']}}</span></h6>
                            <h6>Bairro: <span>{{$cliente->endereco['bairro']}}</span></h6>
                            <h6>Número: <span>{{$cliente->endereco['numero']}}</span></h6>
                            <h6>Cidade: <span>{{$cliente->endereco['cidade']}}</span></h6>
                            <h6>Estado: <span>{{$cliente->endereco['estado']}}</span></h6>
                        </div>
                    </div>
                </div>
                <div class="client-docs">
                    <h4>Documentos :</h4>
                    <div class="add-pdf-icon">
                        <x-add-pdf />
                    </div>
                    <ul>
                        @foreach($cliente->documentos as $docs)
                        <li>
                            <a href="{{$docs['url']}}" target="_blank">
                                @if($docs['type'] === 'pdf')
                                <x-pdf-gray />
                                @else
                                <x-image-icon />
                                @endif
                            </a>
                            {{ $docs['nome'] }} <span>({{$docs['descricao']}})</span>
                            </a>
                            @endforeach
                    </ul>
                </div>

            </div>
            <div class="add-document-container close-document document{{ $loop->index }}">
                <form method="POST" action="{{ route('cliente.doc') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="arquivos">Selecione os documentos:</label>
                    <input type="hidden" name="cliente_id" value="{{ $cliente->id }}" />
                    <div class="input-files-container">
                        <input class="arquivos input-files" type="file" name="arquivos[]" required multiple>
                        <p>Clique aqui para adicionar os arquivos</p>
                    </div>
                    <div class="camposExtras"></div>
                    <input class="input-button" type="submit" value="Enviar">
                </form>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<script>

    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.add-pdf-icon').forEach(function (icon, index) {
            icon.addEventListener('click', function () {
                let addDocumentForm = document.querySelector('.document' + index);
                addDocumentForm.classList.toggle('close-document');
                addDocumentForm.classList.toggle('open-document');
            });
        });

        document.querySelectorAll('.add-client-icon').forEach(function (icon) {
            icon.addEventListener('click', function () {
                let appointmentsRight = document.querySelector('.clients-right');
                let opacityBg = document.querySelector('.client-opacity-bg');

                appointmentsRight.classList.toggle('active-x');
                appointmentsRight.classList.toggle('no-active-x');
                opacityBg.classList.toggle('active-opacity');
                opacityBg.classList.toggle('no-active-opacity');
            });
        });

        document.querySelectorAll('.close-client-icon').forEach(function (icon) {
            icon.addEventListener('click', function () {
                let appointmentsRight = document.querySelector('.clients-right');
                let opacityBg = document.querySelector('.client-opacity-bg');

                appointmentsRight.classList.toggle('active-x');
                appointmentsRight.classList.toggle('no-active-x');
                opacityBg.classList.toggle('active-opacity');
                opacityBg.classList.toggle('no-active-opacity');
            });
        });


        document.getElementById('searchInput').addEventListener('input', function () {
            let searchTerm = this.value.toLowerCase();
            let searchResults = document.getElementById('searchClients');
            let items = searchResults.getElementsByClassName('searchable-div');
            let names = searchResults.getElementsByClassName('searchable-name');
            let infos = searchResults.getElementsByClassName('searchable-info');

            for (let i = 0; i < items.length; i++) {
                let name = names[i];
                let item = items[i];
                let info = infos[i];

                let textContent = name.textContent || name.innerText;

                if (textContent.toLowerCase().includes(searchTerm)) {
                    item.style.display = 'flex';
                    info.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                    info.style.display = 'none';
                }
            }
        });

    });

    document.addEventListener('DOMContentLoaded', function () {
        var arrowIcons = document.querySelectorAll('.arrow-icon');

        arrowIcons.forEach(function (arrowIcon) {
            arrowIcon.addEventListener('click', function () {
                var clientInfo = this.closest('.client-container').nextElementSibling;

                if (clientInfo.style.height === '0px' || clientInfo.style.height === '') {
                    clientInfo.style.height = clientInfo.scrollHeight + 'px';
                } else {
                    clientInfo.style.height = '0';
                }
            });
        });
    });

    $(document).ready(function () {
        $('.arquivos').change(function () {
            var camposExtrasDiv = $(this).closest('form').find('.camposExtras');
            camposExtrasDiv.empty();

            var files = this.files;

            for (var i = 0; i < files.length; i++) {
                var nomeInput = $('<input>').attr({
                    type: 'text',
                    name: 'nomes[]',
                    value: files[i].name
                });

                var descricaoInput = $('<input>').attr({
                    type: 'text',
                    name: 'descricoes[]',
                    placeholder: 'Descrição'
                });

                camposExtrasDiv.append(nomeInput).append(descricaoInput);
            }
        });
    });

</script>