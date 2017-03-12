<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('titol')</title>
	{!! Html::script('js/jquery-3.1.1.min.js') !!}
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
            {{-- @include('receptes.busqueda') --}}
						{{-- VUE --}}
						<div id="app">
            	<multiselect
            	title = "Selecciona els teus ingredients"
            	placeholder = "Selecciona mes d'un ingredient..."
            	></multiselect>
						{{--<multiselect :options="{{ $ingredients->toJson() }}" title="Ingredients"  ></multiselect>--}}
						</div>
						{{-- /VUE --}}
            <div style="margin-top: 100px;"></div>
            {{-- @include('receptes.busqueda') --}}
        </div>
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
