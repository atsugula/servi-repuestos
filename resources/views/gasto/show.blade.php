@extends('layouts.app')

@section('title')
    {{__('Create expense')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{__('Create expense')}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('gastos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>{{__('Type of value')}}:</strong>
                            {{ $gasto->tipoGasto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Value')}}:</strong>
                            {{ $gasto->valor }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Date')}}:</strong>
                            {{ date('Y-m-d',strtotime($gasto->fecha)) }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Observations')}}:</strong>
                            {{ $gasto->observaciones }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
