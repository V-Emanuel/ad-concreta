<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Cidade;
use App\Models\Ramo;
use App\Models\Atendimento;

class Atendimentos extends Component
{
    /**
     * Create a new component instance.
     */public $cidades;
    public $ramos;
    public $atendimentos;
    public function __construct()
    {
        $this->cidades = Cidade::all();
        $this->ramos = Ramo::all();
        $this->atendimentos = Atendimento::orderBy('created_at', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.atendimentos');
    }
}
