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
        'text'    => 'Productos',
        'icon'    => 'fa fa-archive',
        'submenu' => [
            [
                'text' => 'Administrar productos',
                'url' => 'productos',
                'icon' => 'fa fa-shopping-basket',
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
];
