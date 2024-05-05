@extends('layouts.app')

@section('title')
    {{__('Expenses')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{__('Expenses')}}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('gastos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>{{__('Type of value')}}</th>
										<th>{{__('Value')}}</th>
										<th>{{__('Date')}}</th>

                                        <th>{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($gastos as $gasto)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $gasto->tipoGasto->nombre }}</td>
											<td>{{ $gasto->valor }}</td>
											<td>{{ date('Y-m-d',strtotime($gasto->fecha)) }}</td>

                                            <td>
                                                <form action="{{ route('gastos.destroy',$gasto->id) }}" method="POST" class="form-delete">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('gastos.show',$gasto->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('gastos.edit',$gasto->id) }}"><i class="fa fa-fw fa-edit"></i></a>
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
                {!! $gastos->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script src="{{ asset('js/plugins/sweetalert.js') }}"></script>
    <script src="{{ asset('js/plugins/datatable.js') }}"></script>

@endsection
