<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartidaController extends Controller
{
    public function create(Request $request)
    {
        $userID = Auth::user()->id;
        $partida = new Partida([
            'acertos' => $request->acertos,
            'erros' => $request->erros,
            'data_hora' => date('d-m-Y H:m:s'),
        ]);

        $partida['user_id'] = $userID;

        $partida->save();

        session()->flash('msg', ['tipo' => 'success', 'text' => 'Progresso salvo, verifique o ranking']);

        // return redirect('/pagina_a_definir');
    }
    public function show()
    {
        $partidas = Partida::orderBy('acertos', 'desc')->orderBy('erros', 'asc')->orderBy('data_hora', 'desc')->get();

        return view('partida.show', compact('partidas'));
    }
}
