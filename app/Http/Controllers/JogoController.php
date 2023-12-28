<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function show()
    {
        return view('jogo.show');
    }
}
