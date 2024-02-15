<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function store(Request $request)
    {
        Agendamento::create($request->all());

        return redirect()->back()->with('success', 'Agendamento salvo!');
    }

    public function delete($id)
    {
        $agendamento = Agendamento::find($id);

        if (!$agendamento) {
            return redirect()->back()->with('success', 'Agendamento não encontrado!');
        }

        $agendamento->delete();
        return redirect()->back()->with('success', 'Agendamento excluído com sucesso!');
    }
}
