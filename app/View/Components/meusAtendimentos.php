<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use App\Models\Cidade;
use App\Models\Ramo;
use App\Models\Atendimento;

class meusAtendimentos extends Component
{
    /**
     * Create a new component instance.
     */
    public $cidades;
    public $ramos;
    public $atendimentos;

    public $userId;
    public function __construct()
    {
        $this->cidades = Cidade::all();
        $this->ramos = Ramo::all();
        $this->atendimentos = Atendimento::orderBy('created_at', 'desc')->get();
        $this->userId = Auth::id();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.meus-atendimentos');
    }
}
