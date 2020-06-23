<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME')}}</title>

        {{-- Styles --}}
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/daterangepicker.css') }}" rel="stylesheet">
        <link href="{{ url('css/icons.css') }}" rel="stylesheet">

        @stack('plugin-css')

        <link href="{{ url('css/custom.css') }}" rel="stylesheet">
        <link href="{{ url('css/light_theme.css') }}" rel="stylesheet">
        <link href="{{ url('css/preloader.css') }}" rel="stylesheet">

        @stack('page-css')

        <script src="{{ url('js/modernizr.min.js') }}"></script>
    </head>

    <body class="fixed-left">
        <div id="wrapper" class="forced">
            <div class="topbar">
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ url('img/logo.png') }}" style="max-height:40px;" alt="Sweetstar">
                            {{-- <span>{{ config('app.name', 'meetaweb') }}</span> --}}
                        </a>
                    </div>
                </div>

                @include('layouts.partials.header')

            </div>

            @include('layouts.partials.menu-left')

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid" id="fullscreen-content-page">
                        @stack('page-filter')

                        @yield('content')
                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->

                <footer class="footer bg-primary text-white-50">
                    {{ date('Y') }} © DUNDERDEV
                </footer>
            </div>
        </div>

        {{--Scripts--}}
        <script src="{{url('js/jquery.min.js')}}"></script>
        <script src="{{url('js/popper.min.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        <script src="{{url('js/moment.min.js')}}"></script>
        <script src="{{url('js/daterangepicker.min.js')}}"></script>
        <script src="{{url('js/jquery.mask.js')}}"></script>
        <script src="{{url('js/wow.min.js')}}"></script>
        <script src="{{url('js/fastclick.js')}}"></script>
        <script src="{{url('js/jquery.slimscroll.js')}}"></script>
        <script src="{{url('js/detect.js')}}"></script>
        <script src="{{url('js/waves.js')}}"></script>
        <script src="{{url('js/jquery.mask.js')}}"></script>
        <script src="{{url('js/bootstrap-input-spinner.js')}}"></script>

        <script>
            let resizefunc = [];
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

        @stack('plugins-js')

        <script src="{{url('plugins/notifyjs/dist/notify.min.js')}}"></script>
        <script src="{{url('plugins/notifications/notify-metro.js')}}"></script>

        <script src="{{url('js/jquery.core.js')}}"></script>
        <script src="{{url('js/jquery.app.js')}}"></script>

        <script src="{{url('js/custom.js')}}"></script>

        @stack('page-js')
    </body>
</html>