<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('cedula',__('ID')) }}
            {{ Form::number('cedula', $cliente->cedula, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''),'min' => '100000', 'placeholder' => __('ID')]) }}
            {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('nombre', __('Name')) }}
                    {{ Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => __('Name')]) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('apellido',__('Last name')) }}
                    {{ Form::text('apellido', $cliente->apellido, ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => __('Last name')]) }}
                    {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('direccion',__('Address')) }}
                    {{ Form::text('direccion', $cliente->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => __('Address')]) }}
                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('telefono',__('Phone')) }}
                    {{ Form::number('telefono', $cliente->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'maxlength'=>'10','placeholder' => __('Phone place')]) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    @include('layouts.btn-submit')
</div>
