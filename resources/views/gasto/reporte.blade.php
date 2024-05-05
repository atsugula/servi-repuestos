@extends('layouts.app3')

@section('title', 'Reporte de gastos')

@section('content')
    @include('template.cabezote')
    <h5 style="text-align: center"><strong>TABLA REPORTE GASTOS</strong></h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th class="alineacion-left">No</th>
                <th class="alineacion-left">Nombre</th>
                <th class="alineacion-left">Valor</th>
                <th class="alineacion-left">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gastos as $gasto)
                <tr class="alineacion-left">
                    <td>{{ $i++ }}</td>
                    <td>{{ $gasto->tipoGasto->nombre }}</td>
                    <td>{{ $gasto->valor }}</td>
                    <td>{{ date('Y-m-d',strtotime($gasto->fecha)) }}</td>
                </tr>
                {{ $total = $total + $gasto->valor}}
            @endforeach
        </tbody>
    </table>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th class="alineacion">TOTAL</th>
            </tr>
        </thead>
        <tbody class="alineacion">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="alineacion">{{ number_format($total, 2) }}</td>
            </tr>
        </tbody>
    </table>
@endsection
