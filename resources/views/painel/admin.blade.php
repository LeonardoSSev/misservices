@extends('painel.templates.template-admin')
@section('content-admin')

<div class="">
<h1>Painel de Administração</h1>

<h4>Relatório Geral</h4>
<div class="box">
    <div class="box-body">
        <canvas id="chart-total-users" data-plugin="chart" height="80"
        </canvas>
    </div>
</div>
</div>

<script>
    window.onload = function(){
        var chart = $("#chart-total-users");

        chart1 = new Chart( chart, {
            type: 'bar',
            data: {
                labels: ['Usuários', 'Categorias', 'Serviços', 'Papéis', 'Permissões', 'Telefones', 'Tipos de telefone'],
                datasets: [{
                    label: 'Relatório Geral',
                    data: [
                        {{ $totalUsers }},
                        {{ $totalCategories }},
                        {{ $totalServices }},
                        {{ $totalRoles }},
                        {{ $totalPermissions }},
                        {{ $totalPhones }},
                        {{ $totalPhoneTypes }}
                    ],
                    fill: true,
                    backgroundColor: "rgba(0, 0, 255, 0.6)",
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                },
                legend: {
                    display: false
                }
            }
        });
    }
</script>

@stop
