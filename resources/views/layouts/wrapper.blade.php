<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}</title>

    {{-- Styles --}}
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/icons.css') }}" rel="stylesheet">
    @stack('plugin-css')

    <link href="{{ url('css/custom.css') }}" rel="stylesheet">
    <link href="{{ url('css/light_theme.css') }}" rel="stylesheet">

    @stack('page-css')
</head>

<body>
    <div class="wrapper-page">
        @yield('content')
    </div>

    <script>
        var resizefunc = [];

        function loading(local, text = '', time = 200) {
            hideLoading();
            $('body').after(`<div class="preloader">
            <div id="preloader">
                <div id="loader"></div>
            </div>
        </div>`);
        }

        function hideLoading() {
            $('.preloader').remove();
        }
    </script>

    {{--Scripts--}}
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/popper.min.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/wow.min.js')}}"></script>
    <script src="{{url('js/fastclick.js')}}"></script>
    <script src="{{url('js/jquery.slimscroll.js')}}"></script>
    <script src="{{url('js/detect.js')}}"></script>
    <script src="{{url('js/waves.js')}}"></script>
    <script src="{{url('js/jquery.mask.js')}}"></script>
    <script src="{{url('js/moment.min.js')}}"></script>

    @stack('plugins-js')

    <script src="{{url('js/custom.js')}}"></script>

    @stack('page-js')
</body>
</html>