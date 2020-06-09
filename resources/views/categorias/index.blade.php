@extends('layout')
@section('cabecalho')
Categorias
@endsection

@section('conteudo')

        <a href="/categorias/criar" class="btn btn-dark mb-2">Adicionar</a>

        <ul class="list-group">
            <?php foreach ($categorias as $categoria) : ?>
                <li class="list-group-item"><?= $categoria?></li>
            <?php endforeach; ?>
        </ul>
 @endsection
