<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class SeriesController extends Controller
{
    public function listarSeries(Request $request){
        $series = Serie::all();

        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request){
        $nome = $request->nome;
        /* $serie = new Serie();
        $serie->nome = $nome;
        $serie->save(); */
        $serie = Serie::create([
            'nome' => $nome
        ]);

        echo "Registro {$serie->id} salvo com sucesso: {$serie->nome}";
    }
}
