<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME')}}</title>

        {{-- Styles --}}
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/materialdesignicons.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/nprogress.min.css') }}" rel="stylesheet">

        @stack('plugin-css')

        <link href="{{ url('css/custom.css') }}" rel="stylesheet">

        @stack('page-css')
    </head>

    <body>
        <header>

        </header>
        @yield('content')
        <footer class="footer">
            {{date('Y')}} © DUNDERDEV
        </footer>

        {{--Scripts--}}
        <script src="{{url('js/jquery.min.js')}}"></script>
        <script src="{{url('js/popper.min.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        <script src="{{url('js/nprogress.js')}}"></script>

        @stack('plugins-js')

        <script src="{{url('js/custom.js')}}"></script>

        @stack('page-js')
    </body>
</html>