<div class="box box-info padding-1">
    <div class="box-body">

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('codigo_propio', 'Código propio') }}
                    {{ Form::text('codigo_propio', $producto->codigo_propio, ['class' => 'form-control' . ($errors->has('codigo_propio') ? ' is-invalid' : ''), 'placeholder' => __('Code')]) }}
                    {!! $errors->first('codigo_propio', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('nombre', 'Nombre servicio') }}
                    {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => __('Name')]) }}
                    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="form-group">
                    {{ Form::label('precio_costo',__('Cost price')) }}
                    {{ Form::number('precio_costo', $producto->precio_costo, ['class' => 'form-control pCosto' . ($errors->has('precio_costo') ? ' is-invalid' : ''), 'min'=>'0','placeholder' => __('Cost price')]) }}
                    {!! $errors->first('precio_costo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    {{ Form::label('porcentaje',__('Porcentage')) }}
                    {{ Form::number('porcentaje', $producto->porcentaje, ['class' => 'form-control porcentaje' . ($errors->has('porcentaje') ? ' is-invalid' : ''), 'min'=>'0', 'max'=>'1000','onkeyup'=>'if(parseInt(this.value)>1000){this.value=1000; return false;}','onmousedown'=>'calcularGanancia()','placeholder' => __('Porcentage')]) }}
                    {!! $errors->first('porcentaje', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="form-group">
                    {{ Form::label('precio_venta',__('Sale price')) }}
                    {{ Form::number('precio_venta', $producto->precio_venta, ['class' => 'form-control pVenta' . ($errors->has('precio_venta') ? ' is-invalid' : ''), 'min'=>'0','placeholder' => __('Sale price')]) }}
                    {!! $errors->first('precio_venta', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('observaciones',__('Observations')) }}
            {{ Form::textArea('observaciones', $producto->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => __('Observations')]) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    @include('layouts.btn-submit')
</div>
