<!DOCTYPE html>
<html lang="es">
<head>
<<<<<<< HEAD
	<meta charset="UTF-8">
	<title>@yield('titol')</title>
	{!! Html::script('js/jquery-3.1.1.min.js') !!}
=======
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!-- Scripts -->
	<script>
			window.Laravel = {!! json_encode([
					'csrfToken' => csrf_token(),
			]) !!};
	</script>

	  {!! Html::script('js/jquery-3.1.1.min.js') !!}
>>>>>>> b4cb0efe37e0c3148ed6461d4369d1c3a289e6f6
    {!! Html::style('css/estil.css') !!}
    <!-- Styles -->
    <link href="{{ asset('plugins/sweetalert/dist/sweetalert.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
</head>
<body>
@include('sweet::alert')    
<section class="content">
    <div class="container">
        <div class="row">
            @yield('contingut')
            @include('receptes.busqueda')
        </div>
    </div>

		<div id="app">
			<Notification></Notification>
		</div>

<script src="/js/app.js"></script>
</section>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="socials">
                        <a href="http://www.dinahosting.com" target="_blank"><img src="img/dinahosting.jpg"></a>
                        <a href="http://websalpunt.cat/" target="_blank" ><img src="img/puntcat.png"/></a>
                    </div>
                </div>
            </div>
            <div class="rowCopyright">
                <div class="copyright">
                    <span class="brand">Unitedcode </span> &copy; <span id="copyright-year"></span> | <a href="#">Política de privacitat</a>
                    <div>Lloc dissenyat per <a href="#" rel="nofollow">United Code</a></div>
                    <div></div><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">
                        <img alt="Llicència de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-sa/4.0/80x15.png" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
