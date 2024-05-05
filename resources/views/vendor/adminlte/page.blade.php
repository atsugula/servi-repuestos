@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Preloader Animation --}}
        @if($layoutHelper->isPreloaderEnabled())
            @include('adminlte::partials.common.preloader')
        @endif

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

        @include('adminlte::partials.footer.footer')

    </div>
@stop

@section('adminlte_js')
    <!-- Sweetalert2 for alerts more nice -->
    <script src="{{ asset('js/plugins/sweetalert2@11.js') }}"></script>
    <!-- Load plugins -->
    <script src="{{ asset('js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('js/plugins/patternomaly.js') }}"></script>
    <script src="{{ asset('js/plugins/chart.min.js') }}"></script>
    <script src="{{ asset('js/plugins/parsley.min.js') }}"></script>
    <script language="JavaScript">
        $(document).ready(() => {
            $('.select2').select2();
        });
        history.forward();
    </script>
    @stack('js')
    @yield('js')
@stop
