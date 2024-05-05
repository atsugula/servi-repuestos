@extends('layouts.app')

@section('title')
    {{__('Show type of value')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{__('Show type of value')}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-gastos.index') }}"> {{__('Back')}}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>{{__('Nombre')}}:</strong>
                            {{ $tipoGasto->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
