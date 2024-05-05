<?php

namespace App\Exports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ProductsExport implements FromView
{

    protected  $model;

    public function __construct()
    {
        $this->model =  new Producto();
    }

    public function title(): string
    {
        return 'Reporte productos';
    }

    public function properties(): array
    {
        return [
            'creator'        => 'ATSU',
            'title'          => 'Productos',
            'company'        => 'ATSU',
        ];
    }

    public function view(): View
    {
        set_time_limit(0);
        // ini_set('memory_limit', '6000M');

        $results = $this->model->all();

        return view('producto.reporte-excel', [
            'data' => $results,
        ]);
    }

}
