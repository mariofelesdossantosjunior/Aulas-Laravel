@extends('layout')
@section('cabecalho')
Series
@endsection

@section('conteudo')

        <a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>

        <ul class="list-group">
            <?php foreach ($series as $serie) : ?>
                <li class="list-group-item"><?= $serie->nome ?></li>
            <?php endforeach; ?>
        </ul>
 @endsection
