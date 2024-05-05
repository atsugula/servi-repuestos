@extends('layouts.app')

@section('title')
    {{__('Show provider')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{__('Show provider')}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proveedores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $proveedore->nit }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Name')}}:</strong>
                            {{ $proveedore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('E-mail')}}:</strong>
                            {{ $proveedore->correo }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Phone')}}:</strong>
                            {{ $proveedore->telefono }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
