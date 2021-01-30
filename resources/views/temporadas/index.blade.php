@extends('layout')

@section('cabecalho')
Temporadas da série {{$serie->nome}}
@endsection

@section('conteudo')

@include('error', ['errors' => $errors])

<ul class="list-group">
    @foreach ($serie->temporadas as $temporada)
    <li class="list-group-item d-flex justify-content-between align-items-center">

        <a href="/temporadas/{{$temporada ->id }}/episodios">
        Temporada {{ $temporada->numero }}
        </a>
        <span class="badge badge-primary">
           {{ $temporada-> getEpisodiosAssistidos()->count()}} / {{ $temporada->episodios->count() }}
        </span>
    </li>
    @endforeach
</ul>
@endsection