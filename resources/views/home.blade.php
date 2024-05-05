@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12">
            <br>
            <div class="row">
                <div class="col-12 col-md-{{$mostrar ? '4' : '6'}}">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$ventas}}</h3>
                            <p>{{__('Number of sales')}}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="{{route('ventas.index')}}" class="small-box-footer">
                            {{__('More info')}} <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-{{$mostrar ? '4' : '6'}}">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                            <h3>{{$clientes}}</h3>
                            <p>{{__('Customer registrations')}}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="{{route('clientes.index')}}" class="small-box-footer">
                            {{__('More info')}} <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                @if($mostrar)
                    <div class="col-12 col-md-4">
                        <div class="small-box bg-gradient-secondary">
                            <div class="inner">
                                <h3>ATSU</h3>
                                <p>{{__('Configurations')}}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <a href="{{route('configuraciones.index')}}" class="small-box-footer">
                                {{__('Make your settings')}} <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="chartVentas" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="chartClientes" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        //Grafica para saber el numero de ventas por mes
        var ctx = document.getElementById('chartVentas').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= $namesVenta ?>,
                datasets: [{
                    axis: 'y',
                    label: 'Número de ventas',
                    data: <?= $dataVenta ?>,
                    fill: false,
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                    ],
                    borderWidth: 4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 200
                    }
                }
            }
        });
        //Grafica para saber el numero de clientes
        var ctx = document.getElementById('chartClientes').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?= $namesCliente ?>,
                datasets: [{
                    data: <?= $dataCliente ?>,
                    backgroundColor: pattern.generate([
                        '#C0392B',
                        '#884EA0',
                        '#2471A3',
                        '#17A589',
                        '#1E8449',
                        '#D4AC0D',
                        '#CA6F1E',
                        '#283747',
                    ]),
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 200
                    }
                }
            }
        });
    </script>
@endsection
