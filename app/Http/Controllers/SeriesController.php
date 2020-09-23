<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

        $qtdTemporadas = $request->qtd_temporadas;
        $episodiosPorTemporada = $request->episodios_por_temporada;

        for ($t=1; $t <= $qtdTemporadas; $t++) { 

            $temporada = $serie->temporadas()->create(['numero' => $t]);

            for ($e=1; $e <= $episodiosPorTemporada; $e++) { 
                $temporada->episodios()->create(['numero'=>$e]);
            }
        }

        $request->session()->flash('mensagem', "Registro {$serie->id} salvo com sucesso: {$serie->nome}");
        return redirect()->route('serie.listar');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Registro excluido com sucesso");
        return redirect()->route('serie.listar');
    }
}
