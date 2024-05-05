<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Error @yield('title')</title>

        <link rel="shortcut icon" href="{{ asset('img/config/favicon.ico') }}" />
        <link rel="stylesheet" href="{{ asset('css/errors.css') }}">

        @yield('css')
        <meta name="robots" content="noindex, follow">
    </head>

    <body>
        @yield('content')
        <div id="notfound">
            <div class="notfound">
                <div class="notfound-404">
                    @yield('codigo')
                </div>
                <p>@yield('mensaje')</p>
                <a href="{{ redirect()->back()->getTargetUrl() }}">@yield('btn')</a>
            </div>
        </div>
    </body>

</html>
