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
		<!--Estilos personales-->
		<link rel="stylesheet" href="css/general.css">
		<link rel="stylesheet" href="css/layout/header.css">
		<link rel="stylesheet" href="css/layout/nav-menu.css">
		@yield('resources-page')
	</head>
	<body>
		<!--========= inicio - navSuperior =========-->
		<nav class="navbar navbar-light ">
			<div class="center-y" href="#">
		  		<img id="btnMenu" src="img/menu.svg" alt="menu" width="20">
		  		<a class="navbar-brand pl-2" href="/">Zone of tires</a>
			</div>
			<div class="center-y">
				<div class="name-user pr-2">{{ Auth::user()->name }}</div>
				<div style="position: relative;">
					<div style="height: 30px; width: 30px; display: block;">
						<img id="img-user" src="data:image/*;base64,{{ base64_encode( Auth::user()->avatar ) }}" width="30" height="30" alt="user" style="border-radius: 30px">
						<div  class="cursor" id="aux-img-user" style="width: 30px; height: 30px; z-index: 1053; position: absolute; display: none; background: red"></div>
					</div>
					<div class="shadow box-conf_account">
						<a class="full-width" style="background: red" href="#">
							<div class="txt-conf_account">Ayuda</div>
						</a>
						<a class="full-width" style="background: red" href="{{ route('account-settings.index') }}">
							<div class="txt-conf_account">Configuracion</div>
						</a>
						<a class="full-width" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<div class="txt-conf_account">Cerrar sesion</div>
						</a>
						<form  id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
							@csrf
						</form>
					</div>
				</div>
			</div>
		</nav>
		<!---------- fin - navSuperior ------------>

		<div style="display:table; position: relative; width: 100%; height: 100vh">
			
			<!--========= inicio - navLateral =========-->
			@include('sidebar')

			<!--========= inicio - contenido =========-->
			<div class="page-container" style="padding: 5px; display: table-cell; position: relative;">
				@yield('content')			
			</div>
		</div>

		<script type="text/javascript" src="js/layout/script.js"></script>
		@yield('scripts')
	</body>
</html>