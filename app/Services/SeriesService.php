<?php

namespace App\Services;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesService
{
    public function criarSerie(Request $request): Serie
    {
        //DB::beginTransaction();
        $serie = new Serie();

        DB::transaction(function () use (&$serie, $request) {

            $serie = Serie::create($request->all());

            $qtdTemporadas = $request->qtd_temporadas;
            $episodiosPorTemporada = $request->episodios_por_temporada;

            for ($t = 1; $t <= $qtdTemporadas; $t++) {

                $temporada = $serie->temporadas()->create(['numero' => $t]);

                for ($e = 1; $e <= $episodiosPorTemporada; $e++) {
                    $temporada->episodios()->create(['numero' => $e]);
                }
            }
        });

        //DB::commit();

        return $serie;
    }

    public function removeSerie(int $id)
    {
        $serie = Serie::find($id);
        $nomeSerie = $serie->nome;

        DB::transaction(function () use ($serie, $id) {

            $serie->temporadas()->each(function (Temporada $temporada) {
                $temporada->episodios()->each(function (Episodio $episodio) {
                    $episodio->delete();
                });
                $temporada->delete();
            });

            $serie->delete();

            Serie::destroy($id);
        });

        return $nomeSerie;
    }
}
