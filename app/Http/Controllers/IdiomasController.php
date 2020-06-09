<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdiomasController extends Controller
{
    public function listarIdiomas(Request $request)
    {

        $idiomas = [
            "Português",
            "Inglês",
            "Espanhol",
            "Italiano",
        ];

        return view('idiomas.index', compact('idiomas'));
    }

    public function create()
    {
        return view('idiomas.create');
    }
}
