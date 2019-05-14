<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts and icons -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
       <script src="{{ asset('atlantis/assets/js/plugin/webfont/webfont.min.js') }}"></script>
        <script>
            WebFont.load({
                google: {"families":["Lato:300,400,700,900"]},
                custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ["{{ asset('atlantis/assets/css/fonts.min.css') }}"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('atlantis/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('atlantis/assets/css/atlantis.min.css') }}">
        @stack('style')

    </head>
    <body data-background-color="dark">
        <div class="wrapper">
            <div class="main-header">
                @include('layouts.logo-header')
                @include('layouts.navbar')
            </div>
            @include('layouts.sidebar')

            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- Scripts -->

    <!--   Core JS Files   -->
    <script src="{{ asset('atlantis/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('atlantis/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('atlantis/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <!-- jQuery UI -->
    <script src="{{ asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

	<!-- Atlantis JS -->
    <script src="{{ asset('atlantis/assets/js/atlantis.min.js') }}"></script>

    <!-- jQuery Scrollbar -->

    @include('partials.msg')
    <script>
        function activateMenu(root, classList){
            $("#" + root).collapse('show');
            ele = document.getElementById(root)
            ele.parentElement.classList.add('active')
            if (classList) {
               ele.getElementsByClassName(classList)[0].classList.add('active')
            }
        }
    </script>
    @stack('scrypt')

</html>
