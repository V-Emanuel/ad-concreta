<?php

namespace App\View\Components;

use App\Models\Cliente;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClientePage extends Component
{
    /**
     * Create a new component instance.
     */
    public $cliente;
    public function __construct($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cliente-page');
    }
}
