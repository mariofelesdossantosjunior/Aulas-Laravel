@extends('layout')
@section('cabecalho')
Prêmios
@endsection

@section('conteudo')

        <a href="/premios/criar" class="btn btn-dark mb-2">Adicionar</a>

        <ul class="list-group">
            <?php foreach ($premios as $premio) : ?>
                <li class="list-group-item"><?= $premio?></li>
            <?php endforeach; ?>
        </ul>
 @endsection
