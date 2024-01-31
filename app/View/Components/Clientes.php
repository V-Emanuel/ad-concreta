<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Cidade;
use App\Models\Ramo;
use App\Models\Cliente;

class Clientes extends Component
{
    /**
     * Create a new component instance.
     */
    public $cidades;
    public $ramos;
    public $clientes;
    public function __construct()
    {
        $this->cidades = Cidade::all();
        $this->ramos = Ramo::all();
        $this->clientes = Cliente::orderBy('created_at', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.clientes');
    }
}
