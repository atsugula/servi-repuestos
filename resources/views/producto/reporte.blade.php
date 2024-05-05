@extends('layouts.app3')

@section('title', 'Reporte de productos')

@section('content')
    @include('template.cabezote')
    <h5 style="text-align: center"><strong>TABLA REPORTE PRODUCTOS A LA VENTA</strong></h5>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th class="alineacion-left">No</th>
                <th class="alineacion-left">Nombre</th>
                <th class="alineacion-left">Marca</th>
                <th class="alineacion-left">Categoria</th>
                <th class="alineacion-left">Stock</th>
                <th class="alineacion-left">Estantería</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                @if ($i!=1)
                    <tr>
                        <td colspan="7"><hr></td>
                    </tr>
                @endif
                <tr class="alineacion-left">
                    <td>{{ $i++ }}</td>

                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->marca }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->estanteria }}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
