<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre',__('Name')) }}
            {{ Form::text('nombre', $tipoGasto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => __('Name')]) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('tipo',__('Type')) }}
            {{ Form::select('tipo', ['Ingreso' => 'Ingreso', 'Egreso' => 'Egreso'], $tipoGasto->tipo, ['class' => 'form-control select2' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un tipo']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>
