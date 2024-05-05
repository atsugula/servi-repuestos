@extends('layouts.app')

@section('title')
    {{ __('Categorys') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categorys') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
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

										<th>{{__('Name')}}</th>

                                        <th>{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categorias as $categoria)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $categoria->nombre }}</td>

                                            <td>
                                                <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST" class="form-delete">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('categorias.show',$categoria->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('categorias.edit',$categoria->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $categorias->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatable.js') }}"></script>

@endsection
