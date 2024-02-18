<x-app-layout>
    <div class="dashboard-main-container">
        <div class="dashboard-container">
            <h1>Movimentações</h1>
            <div class="dashboard-movements">
                <div class="dashboard-records">
                    <h2>Atendimentos</h2>
                    <div class="appointments-metrics">
                        <p class="all-appointments">{{$numAtendimentos}}</p>
                        <ul class="appointments-per-date">
                            <li> <x-calendar-icon/> <strong>{{$agendamentosDoDia}}</strong>
                            @if($agendamentosDoDia == 1)
                            Atendimento
                            @else
                            Atendimentos
                            @endif hoje</li>
                            <li> <x-calendar-icon/> <strong>{{$agendamentosDaSemana}}</strong>
                            @if($agendamentosDaSemana == 1)
                            Atendimento
                            @else
                            Atendimentos
                            @endif essa semana</li>
                        </li>
                            <li> <x-calendar-icon/> <strong>{{$agendamentosDoMes}}</strong>
                            @if($agendamentosDoMes == 1)
                            Atendimento
                            @else
                            Atendimentos
                            @endif esse mês
                        </li>
                        </ul>
                    </div>
                </div>
                <div class="dashboard-notifications">
                <h2>Notificações</h2>
                </div>
            </div>
            <h1>Informações Gerais</h1>
            <ul class="dashboard-services">
                <li class="service-1">
                    <div class="service-icon">
                        <x-people-icon />
                    </div>
                    <span>
                        <h5><strong>{{$quantClientes}}</strong> <br />
                            @if($quantClientes == 1)
                            Cliente
                            @else
                            Clientes
                            @endif
                        </h5>
                    </span>
                </li>
                <li class="service-2">
                    <div class="service-icon">
                        <x-document-icon />
                    </div>
                    <span>
                        <h5><strong>{{$documentos}}</strong><br />
                            @if($quantClientes == 1)
                            Documento
                            @else
                            Documentos
                            @endif
                        </h5>
                    </span>

                </li>
                <li class="service-3">
                    <div class="service-icon">
                        <x-lawyer-icon />
                    </div>
                    <span>
                        <h5><strong>{{$colaboradores}}</strong><br />
                            @if($colaboradores == 1)
                            Colaborador
                            @else
                            Colaboradores
                            @endif
                        </h5>
                    </span>
                </li>
                <li class="service-4">
                    <div class="service-icon">
                        <x-gavel-icon />
                    </div>
                    <span>
                        <h5><strong>{{$processos}}</strong><br />
                            @if($processos == 1)
                            Processo
                            @else
                            Processos
                            @endif
                        </h5>
                    </span>
                </li>
            </ul>
            <h1>Agendamentos</h1>
            <div class="dashboard-updates">
                <div class="dashboard-schedules">
                </div>
                <div class="dashboard-calendar">
                </div>
            </div>
            <h1>Alguma Coisa</h1>
            <div class="alguma-coisa"></div>
        </div>
        <footer class="dashboard-footer">
            <div class="dashboard-footer-logo">
                <x-vg-nome />
                <p>ADVOGADOS ASSOCIADOS</p>
            </div>
        </footer>
    </div>

</x-app-layout>