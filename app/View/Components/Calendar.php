<?php

namespace App\View\Components;

use App\Models\Agendamento;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Calendar extends Component
{
    /**
     * Create a new component instance.
     */
    public $agendamentos;

    public function __construct()
    {
        $this->agendamentos = Agendamento::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.calendar');
    }
}
