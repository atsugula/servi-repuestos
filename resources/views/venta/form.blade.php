<div class="box box-info padding-1">
    <div class="box-body">
        <!--=====================================
                ENTRADA DEL COMPRADOR
        ======================================-->
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('codigo',__('Code')) }}
                    {{ Form::text('codigo', $venta->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'readonly','placeholder' => __('Code')]) }}
                    {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('id_usuario',__('Seller')) }}
                    {!! Form::hidden('id_usuario', $venta->id_usuario != '' ? $venta->id_usuario : auth()->user()->id) !!}
                    {{ Form::text('usuarios', $venta->id_usuario != '' ? $venta->usuario->nombre : auth()->user()->name, ['class' => 'form-control' . ($errors->has('id_usuario') ? ' is-invalid' : ''), 'readonly','placeholder' => __('Seller')]) }}
                    {!! $errors->first('id_usuario', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group">
                    {!! $errors->first('productos', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <!--=====================================
                        ENTRADA PARA EL CLIENTE
                ======================================-->
                <div class="form-group">
                    {{ Form::label('id_cliente',__('Client')) }}
                    {{ Form::select('id_cliente', $clientes, $venta->id_cliente, ['class' => 'form-control select2' . ($errors->has('id_cliente') ? ' is-invalid' : ''), 'placeholder' => __('Select the client')]) }}
                    {!! $errors->first('id_cliente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <!--=====================================
                    ENTRADA PARA EL TIPO DE PAGO
                ======================================-->
                <div class="form-group">
                    {{ Form::label('tipo_pago',__('Type of payment')) }}
                    {{ Form::select('tipo_pago', ['Contado','Crédito'], $venta->tipo_pago, ['class' => 'form-control select2 tipoPago' . ($errors->has('tipo_pago') ? ' is-invalid' : ''), 'required' => 'required', 'placeholder' => __('Select the type of payment')]) }}
                    {!! $errors->first('tipo_pago', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <!--=====================================
        GUARDAR PRODUCTOS SELECCIONADOS
        ======================================-->
        <input type="hidden" id="listaProductos" name="listaProductos" value="{{ $venta->productos }}">
        <!--========================================
        ENTRADA PARA AGREGAR PRODUCTO Y CANTIDADES
        =========================================-->
        <div class="nuevoProducto">
            @if ($accion != 'crear')
                @php
                    $listaProducto = json_decode($venta->productos, true);
                    foreach ($listaProducto as $key => $value) {
                        $nuevoStockProducto = $stocks[$key] - $value['cantidad'];
                        echo    '<div class="row">
                                    <div class="col-12 col-md-4">
                                        <label for="nuevaDescripcion">Seleccione un producto</label>
                                        <div class="input-group">
                                            <button type="button" class="btn btn-danger quitarProducto" idProducto="'.$value['id'].'"><i class="fa fa-times"></i></button>
                                            <input type="text" class="form-control nuevaDescripcion" idProducto="'.$value['id'].'" name="nuevaDescripcion" value="'.$value['descripcion'].'" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label for="nuevaCantidad">Ingrese la cantidad a vender</label>
                                            <input type="number" class="form-control nuevaCantidad" name="nuevaCantidad" min="1" value="'.$value['cantidad'].'" stock="'.$stocks[$key].'" nuevoStock="'.$nuevoStockProducto.'" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label for="nuevoDescuento">Descuento</label>
                                            <input type="number" class="form-control nuevoDescuento" name="nuevoDescuento" min="0" value="'.$value['descuento'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="nuevaCantidad">Ingrese el precio del producto</label>
                                        <div class="form-group">
                                            <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                            <input type="number" class="form-control nuevoPrecio" name="nuevoPrecio" value="'.$value['precio'].'" min="50"required>
                                        </div>
                                    </div>
                                </div>';
                    }
                @endphp
            @endif

        </div>
        <!--=====================================
        BOTÓN PARA AGREGAR PRODUCTOS REGISTRADOS
        ======================================-->
        <button type="button" class="btn btn-success btn-block btnAgregarProducto">{{__('Add product')}}</button>
        <hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('saldo_pendiente',__('Balance due')) }}
                    {{ Form::number('saldo_pendiente', $venta->saldo_pendiente, ['class' => 'form-control','readonly','required','id'=>'saldo_pendiente' . ($errors->has('saldo_pendiente') ? ' is-invalid' : ''), 'placeholder' => '000000']) }}
                    {!! $errors->first('saldo_pendiente', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('total',__('Total')) }}
                    {{ Form::number('total', $venta->total, ['class' => 'form-control','readonly','required','id'=>'nuevoTotalVenta' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => '000000']) }}
                    {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
    </div>
    @include('layouts.btn-submit')
</div>
