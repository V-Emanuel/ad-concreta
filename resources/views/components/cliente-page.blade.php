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
        <div class="cliente-content-right">
            <h6>Documentos: </h6>
            <span class="add-document">
                <x-add-pdf />
            </span>
        </div>
    </div>
</div>