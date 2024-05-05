@extends('layouts.app')

@section('title')
    {{__('Update config')}}
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{__('Update config')}}</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('home') }}"> {{__('Back')}}</a>
                        </div>
                    </div>
                    {{-- Plantilla mensajes--}}
                    @include('layouts.mensajes')
                    <div class="card-body">
                        <form method="POST" action="{{ route('configuraciones.update') }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @include('configuracione.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // Vista previa icono en configuracion
        $("#input-icono").on("change", function () {
            const img = new Image();
            const image = this.files[0];
            if (!image) return;
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                img.src = reader.result;
                $(`#img-icono`).attr("src", reader.result);
            });
            reader.readAsDataURL(image);
        });
        // Vista previa logo_auth en configuracion
        $("#input-logo_auth").on("change", function () {
            const img = new Image();
            const image = this.files[0];
            if (!image) return;
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                img.src = reader.result;
                $(`#img-logo_auth`).attr("src", reader.result);
            });
            reader.readAsDataURL(image);
        });
        // Vista previa icono en configuracion
        $("#input-img_auth").on("change", function () {
            const img = new Image();
            const image = this.files[0];
            if (!image) return;
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                img.src = reader.result;
                $(`#img-img_auth`).attr("src", reader.result);
            });
            reader.readAsDataURL(image);
        });
    </script>
@endsection
