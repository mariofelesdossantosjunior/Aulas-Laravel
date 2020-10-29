<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\SeriesService;
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

    public function store(SeriesFormRequest $request)
    {
        $seriesService = new SeriesService();
        $serie = $seriesService->criarSerie($request);

        $request->session()->flash('mensagem', "Registro {$serie->id} salvo com sucesso: {$serie->nome}");
        return redirect()->route('serie.listar');
    }

    public function destroy(Request $request)
    {
        $seriesService = new SeriesService();
        $nomeSerie = $seriesService->removeSerie($request->id);

        $request->session()->flash('mensagem', "Serie {$nomeSerie} excluido com sucesso");
        return redirect()->route('serie.listar');
    }

    public function editarNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
