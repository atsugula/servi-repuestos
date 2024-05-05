@extends('layouts.app')

@section('title')
    {{ __('Products') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm"  data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                            <form class="form-inline my-2 my-lg-0 float-right" role="search">
                                <input name="buscarpor" class="form-control me-2" type="search" placeholder="{{__('Search')}}" aria-label="Search" value="{{$buscarpor}}">
                                <button class="btn btn-outline-success" type="submit">{{__('Search')}}</button>
                            </form>
                        </div>
                    </div>

                    {{-- Plantilla mensajes--}}
                    @include('layouts.mensajes')

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-productos">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>{{__('Name')}}</th>
										<th>{{__('Branch')}}</th>
										<th>{{__('Code')}}</th>
										<th>{{__('Stock')}}</th>
										<th>{{__('Sale price')}}</th>

                                        <th>{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($productos as $producto)
                                        <tr class="{{$producto->stock <= 3 ? 'table-danger' : ''}}">
                                            <td>{{ ++$i }}</td>
											<td>{{ $producto->nombre }}</td>
											<td>{{ $producto->marca }}</td>
											<td>{{ $producto->codigo }}</td>
											<td>{{ $producto->stock }}</td>
											<td>{{ $producto->precio_venta }}</td>

                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST" class="form-delete">
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                            <br>
                            {{ $productos->appends(request()->except('page'))->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatableProduct.js') }}"></script>

@endsection
