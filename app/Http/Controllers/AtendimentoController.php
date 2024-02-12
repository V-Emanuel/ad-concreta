<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AtendimentoController extends Controller
{
    public function create(Request $request)
    {
        $data = array_merge($request->all(), ['userId' => Auth::id()]);

        Atendimento::create($data);

        return redirect()->route('atendimentos')->with('success', 'Atendimento cadastrado com sucesso!');
    }
}
