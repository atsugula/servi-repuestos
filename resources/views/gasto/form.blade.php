<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_tipo_gasto',__('Type of value')) }}
                    {{ Form::select('id_tipo_gasto', $tipoGastos, $gasto->id_tipo_gasto, ['class' => 'form-control select2' . ($errors->has('id_tipo_gasto') ? ' is-invalid' : ''), 'placeholder' => __('Select the type of values')]) }}
                    {!! $errors->first('id_tipo_gasto', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('valor',__('Value')) }}
                    {{ Form::number('valor', $gasto->valor, ['class' => 'form-control' . ($errors->has('valor') ? ' is-invalid' : ''), 'placeholder' => __('Value')]) }}
                    {!! $errors->first('valor', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('observaciones',__('Observations')) }}
            {{ Form::textArea('observaciones', $gasto->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => __('Observations')]) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    @include('layouts.btn-submit')
</div>
