<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class TemporadasController extends Controller
{
    public function index($serieId)
    {
        $serie = Serie::find($serieId);
        return view('temporadas.index', compact('serie'));
    }
}