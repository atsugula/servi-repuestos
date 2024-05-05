@extends('layouts.app')

@section('title')
    {{ __('Products') }}
@endsection

@section('plugins.DateRangePicker', true)

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header text-center">
                        <strong>Generar reporte</strong>
                    </div>
                    <div class="card-body">
                        <div class="box box-info padding-1">
                            <div class="box-body">
                                <form action="{{ route('productos.reporte.pdf') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-md-4"></div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <input id="fechaInicial" name="fechaInicial" type="hidden">
                                                <input id="fechaFinal" name="fechaFinal" type="hidden">
                                                <button type="button" class="btn btn-default pull-right" id="daterange-btn">

                                                    <span><i class="fa fa-calendar"></i> Rango de fecha</span>

                                                    <i class="fa fa-caret-down"></i>

                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4"></div>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-block">{{ __('Generate report') }} <i class="fa fa-file"></i></button>
                                </form>
                                <br>
                                <button action="{{ route('productos.reporte.excel') }}" method="get" class="btn btn-success btn-block">{{ __('Generate report') }} Excel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/views/producto-rango.js') }}"></script>

@endsection
