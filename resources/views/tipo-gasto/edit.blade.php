@extends('layouts.app')

@section('title')
    {{__('Update type of value')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{__('Update type of value')}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-gastos.index') }}"> {{__('Back')}}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tipo-gastos.update', $tipoGasto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('tipo-gasto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
