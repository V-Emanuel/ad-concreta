<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Models\Cidade;
use App\Models\Ramo;
use App\Models\Cliente;
use GuzzleHttp\Client;


class HeaderViewsController extends Controller
{

    public function dashboardView()
    {
        $clientes = Cliente::all();
        $quantClientes = count($clientes);
        $atendimentos = Atendimento::all();
        $colaboradores = count( User::where('admin', 0)->get());
        $documentos = 0;
        

        foreach ($clientes as $cliente) {

            $documentos = $documentos + count($cliente->documentos);

        }

        return view("dashboard", compact("documentos", "quantClientes", "atendimentos", "colaboradores"));
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
