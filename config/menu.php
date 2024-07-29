<?php

return [
    [
        'text' => 'Usuarios',
        'url' => 'usuarios',
        'icon' => 'fa fa-user-circle',
    ],
    [
        'text' => 'Clientes',
        'url' => 'clientes',
        'icon' => 'fas fa-fw fa-users',
    ],
    [
        'text' => 'Proveedores',
        'url' => 'proveedores',
        'icon' => 'fa fa-ship',
    ],
    [
        'text' => 'Categorias',
        'url' => 'categorias',
        'icon' => 'fa fa-industry',
    ],
    [
        'text'    => 'Administrar Productos',
        'icon'    => 'fa fa-archive',
        'submenu' => [
            [
                'text' => 'Listados',
                'url' => 'productos',
                'icon' => 'fa fa-shopping-basket',
            ],
            [
                'text' => 'Nuevo producto',
                'url' => 'productos/create',
                'icon' => 'fa fa-plus-circle',
            ],
            [
                'text' => 'Nuevo servicio',
                'url' => 'servicios/create',
                'icon' => 'fa fa-plus-square',
            ],
            [
                'text' => 'Generar reporte',
                'url' => 'products/export',
                'target' => '_blank',
                'icon' => 'fa fa-file-excel',
            ],
        ],
    ],
    [
        'text'    => 'Gastos',
        'icon'    => 'fa fa-university',
        'submenu' => [
            [
                'text' => 'Tipos de gasto',
                'url' => 'tipo-gastos',
                'icon' => 'fa fa-shopping-basket',
            ],
            [
                'text' => 'Administrar gastos',
                'url' => 'gastos',
                'icon' => 'fa fa-envelope-open',
            ],
            [
                'text' => 'Generar reporte',
                'url' => 'pdf/gastos',
                'target' => '_blank',
                'icon' => 'fa fa-file-pdf',
            ],
        ],
    ],
    [
        'text'    => 'Ventas',
        'icon'    => 'fa fa-shopping-bag',
        'submenu' => [
            [
                'text' => 'Administrar ventas',
                'url' => 'ventas',
                'icon' => 'fa fa-shopping-bag',
            ],
            [
                'text' => 'Crear ventas',
                'url' => 'ventas/create',
                'icon' => 'fa fa-shopping-cart',
            ],
        ],
    ],
    [
        'text'    => 'Cotizaciones',
        'icon'    => 'fa fa-list-alt',
        'submenu' => [
            [
                'text' => 'Administrar cotizaciones',
                'url' => 'cotizaciones',
                'icon' => 'fa fa-shopping-bag',
            ],
            [
                'text' => 'Crear Cotización',
                'url' => 'cotizaciones/create',
                'icon' => 'fa fa-shopping-cart',
            ],
        ],
    ],
];
