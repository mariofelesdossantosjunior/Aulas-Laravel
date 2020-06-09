@extends('layout')
@section('cabecalho')
Status
@endsection

@section('conteudo')

        <a href="/status/criar" class="btn btn-dark mb-2">Adicionar</a>

        <ul class="list-group">
            <?php foreach ($status as $status) : ?>
                <li class="list-group-item"><?= $status?></li>
            <?php endforeach; ?>
        </ul>
 @endsection
