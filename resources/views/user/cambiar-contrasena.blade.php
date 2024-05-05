@extends('layouts.app-contrasena')

@section('auth_body')
<br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Change password for').':'.$user->name }}</span>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('home') }}"> {{__('Cancel')}}</a>
                        </div>
                    </div>
                    @if (isset($message))
                        <div class="alert alert-warning">
                            <p>{{ __($message) }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('usuarios.cambiar-contrasena', $user) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            {{ Form::hidden('id', $user->id) }}
                            <div class="form-group">
                                {{ Form::label('password',__('Password')) }}
                                {{ Form::password('password', ['placeholder'=>'*********','class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('password',__('Confim password')) }}
                                {{ Form::password('password_confirmation', ['placeholder'=>'*********','class' => 'form-control']) }}
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @include('layouts.btn-submit')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
