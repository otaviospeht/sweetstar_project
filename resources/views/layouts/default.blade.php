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
        <link href="{{ url('css/nprogress.css') }}" rel="stylesheet">
        <link href="{{ url('css/daterangepicker.css') }}" rel="stylesheet">

        @stack('plugin-css')

        <link href="{{ url('css/custom.css') }}" rel="stylesheet">

        @stack('page-css')
    </head>

    <body>
        @include('layouts.partials.header')

        <div class="content-page">
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1">
                    @yield('content')
                </div>
            </div>
        </div>
        <footer class="footer bg-primary">
            {{ date('Y') }} © DUNDERDEV
        </footer>

        {{--Scripts--}}
        <script src="{{url('js/jquery.min.js')}}"></script>
        <script src="{{url('js/moment.min.js')}}"></script>
        <script src="{{url('js/daterangepicker.min.js')}}"></script>
        <script src="{{url('js/popper.min.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        <script src="{{url('js/nprogress.js')}}"></script>

        @stack('plugins-js')

        <script src="{{url('js/custom.js')}}"></script>

        @stack('page-js')
    </body>
</html>