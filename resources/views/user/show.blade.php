@extends('layouts.app')

@section('title')
    {{ __('Show user') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show user') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> {{__('Back')}}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>{{__('Type of user')}}:</strong>
                            {{ $user->tipo_usuario > 0 ? 'Empleado' : 'Administrador' }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Name')}}:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('Last name')}}:</strong>
                            {{ $user->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>{{__('ID')}}:</strong>
                            {{ $user->cedula }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
