@extends('layouts.app')

@section('title')
    {{ __('Update user') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Update user') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> {{__('Back')}}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('usuarios.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            {{ Form::hidden('id', $user->id) }}
                            <div class="form-group">
                                {{ Form::label('tipo_usuario',__('Type of user')) }}
                                {{ Form::select('tipo_usuario', ['Administrador','Empleado'], $user->tipo_usuario, ['class' => 'form-control select2' . ($errors->has('tipo_usuario') ? ' is-invalid' : ''), 'placeholder' => __('Select type of user')]) }}
                                {!! $errors->first('tipo_usuario', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name',__('Name')) }}
                                {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('Name')]) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            @include('layouts.btn-submit')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
