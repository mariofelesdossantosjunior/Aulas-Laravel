<?php

namespace App\Services;

use App\Serie;
use Illuminate\Http\Request;

class SeriesService
{
    public function criarSerie(Request $request): Serie
    {
        $serie = Serie::create($request->all());

        $qtdTemporadas = $request->qtd_temporadas;
        $episodiosPorTemporada = $request->episodios_por_temporada;

        for ($t = 1; $t <= $qtdTemporadas; $t++) {

            $temporada = $serie->temporadas()->create(['numero' => $t]);

            for ($e = 1; $e <= $episodiosPorTemporada; $e++) {
                $temporada->episodios()->create(['numero' => $e]);
            }
        }

        return $serie;
    }
}
