@extends('layout')

@section('cabecalho')
episodios
@endsection

@section('conteudo')

@include('error', ['errors' => $errors])

@include('mensagem')

<form action="/temporadas/{{ $temporadaId }}/episodios/assistidos" method="POST">
    @csrf
    <ul class="list-group">
        @foreach ($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episodio {{ $episodio->numero }}
            <input type="checkbox" name="episodios[]" value="{{$episodio->id}}"
                {{ $episodio->assistido ? 'checked' : ''}}>
        </li>
        @endforeach
    </ul>
    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
</form>
@endsection