@extends('layout')
@section('cabecalho')
Adicionar Series
@endsection

@section('conteudo')

        <form action="{{route('serie.adicionar')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
            </div>
            <br>
            <button class="btn btn-primary">Adicionar</button>
        </form>
 @endsection
