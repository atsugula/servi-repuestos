@extends('layouts.app4')

@section('title', 'Factura venta')

@section('content')
    <div class="ticket centrado">
        @include('template.cabezote-factura')
        <table>
            <tbody>
                <tr>
                    <th class="mt8">Cod</th>
                    <th class="mt8">Descripción</th>
                    <th class="mt8"></th>
                    <th class="mt8"></th>
                </tr>
                <tr>
                    <th class="mt8">Cant</th>
                    <th class="mt8">Vr/Und</th>
                    <th class="mt8">Dct</th>
                    <th class="mt8">Total</th>
                </tr>
                <span class="space-border"></span>
                @php
                    $total = 0;
                    $cantidadProducto = 0;
                @endphp
                @forelse ($productos as $producto)
                    @php
                        $total += $producto["cantidad"] * $producto["precio"];
                        $parts = explode(' - ', $producto["descripcion"]);
                        $firstDescripcion = $parts[0];
                    @endphp
                    <tr>
                        <th class="mt8">
                            {{ $producto["codigo_propio"] }}
                        </th>
                        <th class="mt8">
                            {{ $firstDescripcion }}
                        </th>
                    </tr>
                    <tr>
                        <th class="mt8">
                            {{ $producto["cantidad"] }}
                        </th>
                        <th class="mt8">
                            {{ $producto["precio"] }}
                        </th>
                        <th class="mt8">
                            0
                        </th>
                        <th class="mt8">
                            {{ $producto["cantidad"] * $producto["precio"] }}
                        </th>
                    </tr>
                @empty
                    
                @endforelse
                <span class="space-border"></span>
                <tr>
                    <th class="mt8">
                        Articulos: {{ count($productos) }}
                    </th>
                    <th class="mt8"></th>
                    <th class="mt8" colspan="2">Total: ${{ $total }}</th>
                </tr>
                <span class="space-border"></span>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR ELEGIRNOS!</p>
    </div>
@endsection