@extends('layout')
@section('cabecalho')
Series
@endsection

@section('conteudo')

@if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
@endif

<a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item">
        {{ $serie->nome }}
        <form action="/series/remover/{{ $serie->id }}" method="POST" onsubmit="return confirm('Desejá realmente excluir?')">
        @csrf
        <button class="btn btn-danger">Excluir</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection
