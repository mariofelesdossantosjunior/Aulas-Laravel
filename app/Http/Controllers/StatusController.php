<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function listarStatus(Request $request)
    {

        $status = [
            "Full HD",
            "4k",
            "HD",
            "3D",
        ];

        return view('status.index', compact('status'));
    }

    public function create()
    {
        return view('status.create');
    }
}
