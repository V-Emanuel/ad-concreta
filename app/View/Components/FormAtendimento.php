<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Cidade;
use App\Models\Ramo;

class FormAtendimento extends Component
{
    /**
     * Create a new component instance.
     */
    public $cidades;
    public $ramos;
    public function __construct()
    {
        $this->cidades = Cidade::all();
        $this->ramos = Ramo::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-atendimento');
    }
}
