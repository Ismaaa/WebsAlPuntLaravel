<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('titol')</title>
	{!! Html::script('js/jquery-3.1.1.min.js') !!}
    {!! Html::style('css/estil.css') !!}
</head>
<body>
	@yield('contingut')
</body>
</html>
