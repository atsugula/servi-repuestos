@extends('layouts.app')

@section('title')
    Actualización cotización
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Actualización cotización</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cotizaciones.index') }}"> {{__('Back')}}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formVenta" method="POST" action="{{ route('cotizaciones.update', $venta->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('venta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

    <script src="{{ asset('js/views/venta.js') }}"></script>

@endsection
