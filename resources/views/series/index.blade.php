@extends('layout')
@section('cabecalho')
Series
@endsection

@section('conteudo')

@include('mensagem')

<a href="{{route('serie.criar')}}" class="btn btn-dark mb-2"><i class="fas fa-plus"></i> Adicionar</a>

<ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{-- {{ $serie->nome }} --}}
        <span id="nome-serie-{{$serie->id}}">{{ $serie->nome }}</span>

        <div class="input-group w-75" hidden id="input-nome-serie-{{ $serie->id }}">
            <input type="text" class="form-control" value="{{ $serie->nome }}">
            <button class="btn btn-primary btn-sm" onclick="editarSerie({{ $serie->id }})">
                <i class="fas fa-check"></i>
            </button>
            @csrf
        </div>

        <div class="d-flex">
            <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                <i class="fas fa-edit"></i>
            </button>

            <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-1">
                <i class="fas fa-external-link-alt"></i>
            </a>
            <form action="{{ route('serie.remover', $serie->id) }}" method="POST"
                onsubmit="return confirm('Desejá realmente excluir?')">
                @csrf
                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>
        </div>
    </li>
    @endforeach
</ul>
<script>
    function toggleInput(serieId) {
        nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        inputNomeSerieEl = document.getElementById(`input-nome-serie-${serieId}`);

        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            inputNomeSerieEl.hidden = true;
        } else {
            inputNomeSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
    }

    function editarSerie(serieId) {
        nome = document.querySelector(`#input-nome-serie-${serieId} > input`).value;
        token = document.querySelector(`input[name="_token"]`).value;

        formData = new FormData();
        formData.append('nome', nome);
        formData.append('_token', token);

        url = `/series/${serieId}/editarNome`;

        const opcoes = {
            body : formData,
            method : 'POST'
        };

        fetch(url, opcoes).then(() => {
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
            toggleInput(serieId);
        });
    }
</script>
@endsection