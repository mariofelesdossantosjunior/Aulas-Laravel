@extends('layout')
@section('cabecalho')
Idiomas
@endsection

@section('conteudo')

        <a href="/idiomas/criar" class="btn btn-dark mb-2">Adicionar</a>

        <ul class="list-group">
            <?php foreach ($idiomas as $idioma) : ?>
                <li class="list-group-item"><?= $idioma?></li>
            <?php endforeach; ?>
        </ul>
 @endsection
