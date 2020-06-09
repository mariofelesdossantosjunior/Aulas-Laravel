<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function listarCategorias(Request $request)
    {

        $categorias = [
            "Ação",
            "Animação",
            "Suspense",
            "Terror",
        ];

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }
}
