@extends('layout')

@section('cabecalho')
episodios
@endsection

@section('conteudo')

<ul class="list-group">
    @foreach ($episodios as $episodio)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Episodio {{ $episodio->numero }}
        <input type="checkbox">
    </li>
    @endforeach
</ul>
<div class="d-flex justify-content-end">
    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
</div>
@endsection