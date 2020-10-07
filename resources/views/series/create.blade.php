@extends('layout')
@section('cabecalho')
Adicionar Series
@endsection

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('serie.adicionar')}}" method="post">
    @csrf
    <div class="row">

        <div class="col col-8">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
        </div>
        <div class="col col-2">
            <label for="qtd_temporadas">Nº Temporadas:</label>
            <input type="text" name="qtd_temporadas" id="qtd_temporadas" class="form-control"
                placeholder="Nº Temporadas">
        </div>
        <div class="col col-2">
            <label for="episodios_por_temporada">Nº Episódios:</label>
            <input type="text" name="episodios_por_temporada" id="episodios_por_temporada" class="form-control"
                placeholder="Nº Episodios">
        </div>
    </div>
    <br>
    <button class="btn btn-primary">Adicionar</button>
</form>
@endsection