<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- Base Meta Tags --}}
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Title --}}
        <title>
            @yield('title', 'Reportes')
        </title>
        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ public_path('img/config/favicon.ico') }}" />
        {{-- Custom Stylesheets --}}
        @yield('css')
        <link href="{{ public_path('css/estilospdf.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    </head>
    <body>
        <!-- Document body -->
        @yield('content')
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright©2024.</strong> All rights reserved. <strong>ATSU</strong>
        </footer>
        {{-- Custom Scripts --}}
        @yield('js')
    </body>
</html>
