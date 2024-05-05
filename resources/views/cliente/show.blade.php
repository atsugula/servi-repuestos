@extends('layouts.app')

@section('title')
    {{__('Show client')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">{{__('Show client')}}</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> {{__('Back')}}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>{{__('Nombre')}}:</strong>
                            {{ $cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('ID')}}:</strong>
                            {{ $cliente->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Last name')}}:</strong>
                            {{ $cliente->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Phone')}}:</strong>
                            {{ $cliente->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Address')}}:</strong>
                            {{ $cliente->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Shopping')}}:</strong>
                            {{ $cliente->total_compras }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Last order')}}:</strong>
                            {{ date('Y-m-d',strtotime($cliente->ultima_compra)) }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
