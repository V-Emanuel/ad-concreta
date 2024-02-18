<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Models\Cidade;
use App\Models\Ramo;
use App\Models\Cliente;
use GuzzleHttp\Client;
use Carbon\Carbon;


class HeaderViewsController extends Controller
{

    public function dashboardView()
    {
        $clientes = Cliente::all();
        $quantClientes = count($clientes);
        $atendimentos = Atendimento::all();
        $numAtendimentos = count($atendimentos);
        $colaboradores = count(User::where('admin', 0)->get());
        $documentos = 0;
        $processos = 0;


        foreach ($clientes as $cliente) {

            $documentos = $documentos + count($cliente->documentos);

            if ($cliente->numero_processo) {
                $processos++;
            }

        }

        $inicioDaSemana = Carbon::now()->startOfWeek();
        $fimDaSemana = Carbon::now()->endOfWeek();
        $inicioDoMes = Carbon::now()->startOfMonth();
        $fimDoMes = Carbon::now()->endOfMonth();

        $agendamentosDoDia = count(Atendimento::whereDate('created_at', Carbon::today())->get());
        $agendamentosDaSemana = count(Atendimento::whereBetween('created_at', [$inicioDaSemana, $fimDaSemana])->get());
        $agendamentosDoMes = count(Atendimento::whereBetween('created_at', [$inicioDoMes, $fimDoMes])->get());

        return view("dashboard", compact("documentos", "quantClientes", "atendimentos", "colaboradores", "processos", "agendamentosDoDia", "agendamentosDaSemana", "agendamentosDoMes", "numAtendimentos"));
    }
    public function appointmentsView()
    {
        $atendimentos = Atendimento::all();
        $cidades = Cidade::all();
        $ramos = Ramo::all();

        return view("header.atendimentos", compact("atendimentos", "cidades", "ramos"));
    }

    public function clientsView()
    {
        $clientes = Cliente::all();
        $cidades = Cidade::all();
        $ramos = Ramo::all();

        return view("header.clientes", compact("clientes", "cidades", "ramos"));
    }

    public function clientIdView($id)
    {
        $cliente = Cliente::find($id);

        return view("header.clienteById", compact("cliente"));
    }

    public function colaboradoresView()
    {
        $users = User::where('admin', 0)->get();
        return view('header.colaboradores', compact("users"));
    }

    public function calendarioView()
    {

        return view('header.calendario');
    }
}
