@extends('layouts.app')

@section('title')
    {{ __('Create sale') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Crear cotización</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cotizaciones.index') }}"> {{__('Back')}}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="formCotizacion" method="POST" action="{{ route('cotizaciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('cotizacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')

    <script src="{{ asset('js/views/cotizacion.js') }}"></script>

@endsection
