@extends('layouts.app')

@section('title')
    {{__('Show product')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{__('Show product')}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> {{__('Back')}}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>{{__('Code')}}:</strong>
                            {{ $producto->codigo }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Name')}}:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Category')}}:</strong>
                            {{ $producto->categoria->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Provider')}}:</strong>
                            {{ $producto->proveedore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Cost price')}}:</strong>
                            {{ $producto->precio_costo }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Porcentage')}}:</strong>
                            {{ $producto->porcentaje }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Sale price')}}:</strong>
                            {{ $producto->precio_venta }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Stock')}}:</strong>
                            {{ $producto->stock }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Observations')}}:</strong>
                            {{ $producto->observaciones }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
