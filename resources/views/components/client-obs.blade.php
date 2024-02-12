<div class="cliente-obs ">
    <h6>Observações: </h6>
    <ul class="obs-list">
        @foreach($cliente->observacoes as $obs)
        <li><strong>✦ ({{$obs['data']}}) - </strong> {{$obs['texto']}}</li>
        @endforeach
    </ul>
    <div class="add-annotation-icon">
        <x-annotate-icon />
    </div>
    <form method="POST" action="{{ route('cliente.obs') }}" class="close-add-obs add-obs-form">
        @csrf
        <p>Adicionar Observação</p>
        <input required name="texto" value="texto" id="texto" type="text"/>
        <input type="hidden" name="cliente_id" value="{{ $cliente->id }}" />
        <span>
        <button type="submit">Adicionar</button>
        </span>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.add-annotation-icon').forEach(function (icon) {
            icon.addEventListener('click', function () {
                let addDocument = document.querySelector('.add-obs-form');
                addDocument.classList.toggle('open-add-obs');
                addDocument.classList.toggle('close-add-obs');
            });
        });
    });
</script>