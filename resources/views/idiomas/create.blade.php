@extends('layout')
@section('cabecalho')
Adicionar Idioma
@endsection

@section('conteudo')

        <form method="post">
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
            </div>
            <br>
            <button class="btn btn-primary">Adicionar</button>
        </form>
 @endsection
