<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nit') }}
            {{ Form::number('nit', $proveedore->nit, ['class' => 'form-control' . ($errors->has('nit') ? ' is-invalid' : ''),'min' => '10000', 'placeholder' => 'Nit']) }}
            {!! $errors->first('nit', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre',__('Name')) }}
            {{ Form::text('nombre', $proveedore->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => __('Name')]) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('correo',__('E-mail')) }}
                    {{ Form::email('correo', $proveedore->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => __('E-mail')]) }}
                    {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('telefono',__('Phone')) }}
                    {{ Form::text('telefono', $proveedore->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => __('Phone place')]) }}
                    {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    @include('layouts.btn-submit')
</div>
