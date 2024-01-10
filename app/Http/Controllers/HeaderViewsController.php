<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Models\Cidade;
use App\Models\Ramo;
use App\Models\Cliente;
use GuzzleHttp\Client;


class HeaderViewsController extends Controller
{
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
}
