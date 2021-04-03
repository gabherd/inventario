<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Zone of tires | @yield('title', 'Zone of tires')</title>
		<!--icon ionic-->
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/material.min.css">
		<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
		<!--Estilos bootstrap-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
		<!--Validator-->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
		<!--Estilos personales-->
		<link rel="stylesheet" href="css/general.css">
		<link rel="stylesheet" href="css/layout/header.css">
		<link rel="stylesheet" href="css/layout/nav-menu.css">
		@yield('resources-page')
	</head>
	<body>
		<!------------ header ------------>
		@include('public.header')

		<div style="display:table; position: relative; width: 100%; height: 100vh">
			
			<!------------ menu lateral ------------>
			@include('public.sidebar')			

			<!------------ contenido ------------>
			<div class="page-container" style="padding: 5px; display: table-cell; position: relative;">
				@yield('content')	
			</div>
		</div>

		<script type="text/javascript" src="js/layout/script.js"></script>
		@yield('scripts')
	</body>
</html>