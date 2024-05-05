@extends('layouts.app')

@section('title')
    {{ __('Sales') }}
@endsection

@section('plugins.DateRangePicker', true)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sales') }}
                            </span>

                            <form action="{{ route('ventas.rango.pdf') }}" method="POST">
                                @csrf
                                <input id="fechaInicial" name="fechaInicial" type="hidden">
                                <input id="fechaFinal" name="fechaFinal" type="hidden">
                                <button type="button" class="btn btn-default pull-right" id="daterange-btn">

                                    <span><i class="fa fa-calendar"></i> Rango de fecha</span>

                                    <i class="fa fa-caret-down"></i>

                                </button>
                                <button type="submit" class="btn btn-primary">Traer reporte <i class="fa fa-file"></i></button>
                            </form>
                        </div>
                    </div>

                    {{-- Plantilla mensajes--}}
                    @include('layouts.mensajes')

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>{{ __('Client') }}</th>
										<th>{{ __('Date') }}</th>
										<th>{{ __('Type of payment') }}</th>
										<th>{{ __('VAR') }}</th>
										<th>{{__('Discount')}}</th>
										<th>{{ __('Total') }}</th>
										<th>{{ __('Balance due') }}</th>

                                        <th>{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ventas as $venta)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $venta->cliente->nombre }}</td>
											<td>{{ date('Y-m-d',strtotime($venta->fecha)) }}</td>
											<td>{{ $venta->tipo_pago }}</td>
											<td>{{ $venta->iva }}</td>
											<td>{{ $venta->descuento }}</td>
											<td>{{ $venta->total }}</td>
											<td>{{ $venta->saldo_pendiente }}</td>

                                            <td>
                                                <form action="{{ route('ventas.destroy',$venta->id) }}" method="POST" class="form-delete">
                                                    <a class="btn btn-sm btn-primary" target="_blank" href="{{ route('ventas.factura',$venta->id) }}"><i class="fa fa-file"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ventas.edit',$venta->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="9">{{__('We have nothing registered.')}}</td>
                                            </tr>
                                        @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ventas->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/views/ventas-rango.js') }}"></script>
    <script src="{{ asset('js/plugins/datatable.js') }}"></script>

@endsection
