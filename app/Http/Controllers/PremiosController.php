<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PremiosController extends Controller
{
    public function listarPremios(Request $request)
    {

        $premios = [
            "Oscar",
            "MTV Movie Awards",
            "Framboesa de Ouro",
            "Globo de Ouro",
        ];

        return view('premios.index', compact('premios'));
    }

    public function create()
    {
        return view('premios.create');
    }
}
