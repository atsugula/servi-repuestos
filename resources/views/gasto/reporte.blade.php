@extends('layouts.app3')

@section('title', 'Estado de cuenta')

@section('content')
    @include('template.cabezote')
    <h5 style="text-align: center"><strong>TABLA INGRESOS</strong></h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th class="alineacion-left">No</th>
                <th class="alineacion-left">Nombre</th>
                <th class="alineacion-left">Tipo</th>
                <th class="alineacion-left">Valor</th>
                <th class="alineacion-left">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gastos_ingresos as $ingreso)
                <tr class="alineacion-left">
                    <td>{{ $i++ }}</td>
                    <td>{{ $ingreso?->tipoGasto?->nombre }}</td>
                    <td>{{ $ingreso?->tipoGasto?->tipo }}</td>
                    <td>{{ $ingreso->valor }}</td>
                    <td>{{ date('Y-m-d',strtotime($ingreso->fecha)) }}</td>
                </tr>
                {{ $ingresos = $ingresos + $ingreso->valor}}
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
                <td class="alineacion">{{ number_format($ingresos, 2) }}</td>
            </tr>
        </tbody>
    </table>
    <h5 style="text-align: center"><strong>TABLA EGRESOS</strong></h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th class="alineacion-left">No</th>
                <th class="alineacion-left">Nombre</th>
                <th class="alineacion-left">Tipo</th>
                <th class="alineacion-left">Valor</th>
                <th class="alineacion-left">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gastos_egresos as $egreso)
                <tr class="alineacion-left">
                    <td>{{ $i++ }}</td>
                    <td>{{ $egreso?->tipoGasto?->nombre }}</td>
                    <td>{{ $egreso?->tipoGasto?->tipo }}</td>
                    <td>{{ $egreso->valor }}</td>
                    <td>{{ date('Y-m-d',strtotime($egreso->fecha)) }}</td>
                </tr>
                {{ $egresos = $egresos + $egreso->valor}}
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
                <td class="alineacion">{{ number_format($egresos, 2) }}</td>
            </tr>
        </tbody>
    </table>
@endsection
