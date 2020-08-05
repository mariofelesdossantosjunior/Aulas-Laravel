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

<a href="{{route('serie.criar')}}" class="btn btn-dark mb-2"><i class="fas fa-plus"></i> Adicionar</a>

<ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $serie->nome }}
        <form action="{{ route('serie.remover', $serie->id) }}" method="POST" onsubmit="return confirm('Desejá realmente excluir?')">
        @csrf
        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
        </form>
    </li>
    @endforeach
</ul>
@endsection
