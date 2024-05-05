<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('tipo_usuario',__('Type of user')) }}
            {{ Form::select('tipo_usuario', ['Administrador','Empleado'], $user->tipo_usuario, ['class' => 'form-control select2' . ($errors->has('tipo_usuario') ? ' is-invalid' : ''), 'placeholder' => __('Select type of user')]) }}
            {!! $errors->first('tipo_usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cedula',__('ID')) }}
            {{ Form::number('cedula', $user->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''),'min' => '100000', 'placeholder' => __('ID')]) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('name',__('Name')) }}
                    {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('Name')]) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('apellido',__('Last name')) }}
                    {{ Form::text('apellido', $user->apellido, ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => __('Last name')]) }}
                    {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>

    </div>
    @include('layouts.btn-submit')
</div>
