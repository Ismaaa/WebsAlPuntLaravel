<!DOCTYPE html>
<html lang="es">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	<meta charset="UTF-8">
	<title>@yield('titol')</title>
	{!! Html::script('js/jquery-3.1.1.min.js') !!}
    {!! Html::style('css/estil.css') !!}
    <!-- Styles -->
    <link href="{{ asset('plugins/sweetalert/dist/sweetalert.css') }}" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('plugins/sweetalert/dist/sweetalert.min.js') }}"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
@include('sweet::alert')
<section class="content">
    <div class="container">
        <div class="row">
            @yield('contingut')
            <div style="margin-top: 100px;"></div>
        </div>
    </div>
<script src="/js/app.js"></script>
</section>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="http://websalpunt.cat/" target="_blank" ><img align="right" class="footer-img" src="/img/puntcat.png"/></a>
                    <a href="http://www.dinahosting.com" target="_blank"><img align="right" class="footer-img" src="/img/dinahosting.jpg"></a>

                    <span>Unitedcode </span> &copy; | <a style="color: #adb0b2;" href="#"><b>Política de privacitat</b></a>
                    <p>Lloc dissenyat per <a style="color: #adb0b2;" href="#"><b>United Code</b></a></p>
                    <a target="_blank" rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
                        <img alt="Llicència de Creative Commons" src="https://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
