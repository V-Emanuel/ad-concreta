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
        $data = array_merge($request->all(), ['user_id' => Auth::id()]);
       Atendimento::create($request->all());
    }
}
