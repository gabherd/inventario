<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>@yield('title', 'Zone of tires')</title>
		<!--icon ionic-->
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/material.min.css">
		<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
		<!--Estilos bootstrap-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
		<!--Estilos personales-->
		<link rel="stylesheet" href="css/general.css">
		<link rel="stylesheet" href="css/layout/header.css">
		<link rel="stylesheet" href="css/layout/nav-menu.css">
		@yield('resources-page')
	</head>
	<body>
		<!--========= inicio - navSuperior =========-->
		<nav class="navbar navbar-light ">
			<div class="" href="#">
		  		<img id="btnMenu" src="img/menu.svg" alt="menu" width="30">
		  		<a class="navbar-brand pl-2" href="/">Zone of tires</a>
			</div>
			<div class="d-flex">
				<div class="name-user pr-2">Usuario</div>
				<div style="position: relative;">
					<div style="height: 30px; width: 30px; display: block;">
						<img id="img-user" src="img/user.svg" width="30" alt="user">
						<div  class="cursor" id="aux-img-user" style="width: 30px; height: 30px; z-index: 1053; position: absolute; display: none; background: red"></div>
					</div>
					<div class="shadow box-conf_account">
						<a href="{{ route('account-settings') }}">Configuracion</a>
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesion</a>
						<form  id="logout-form"  action="{{ route('logout') }}" method="POST">
							@csrf
						</form>
					</div>
				</div>
			</div>
		</nav>
		<!---------- fin - navSuperior ------------>

		<div style="display:table; position: relative; width: 100%; height: 100vh">
			
			<!--========= inicio - navLateral =========-->
			<section class="full-width navLateral" style="display: table-cell;">
				<div style="position: absolute; width: 20%; top: 10;">
					<div class="full-width navLateral-body" style="position: relative;">
						<!--figure class="full-width" style="height: 77px;">
							<div class="navLateral-body-cl">
								<img src="/img/user.svg" alt="Avatar" class="img-responsive">
							</div>
							<figcaption class="navLateral-body-cr hide-on-tablet">
								<span>
									Full Name Admin<br>
									<small>Admin</small>
								</span>
							</figcaption>
						</figure-->
						<nav class="full-width">
							<ul class="full-width list-unstyle menu-principal" style="">
								<li class="full-width">
									<a href="/" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-view-dashboard"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											Dashboard
										</div>
									</a>
								</li>
								<li class="full-width divider-menu-h"></li>
								<li class="full-width" style="position: relative; padding-right: 2px">
									<a href="#!" class="full-width btn-subMenu">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-case"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											Inventario
										</div>
										<span class="zmdi zmdi-chevron-left"></span>
									</a>
									<ul class="full-width menu-principal sub-menu-options">
										<li class="full-width">
											<a href="{{ route('products.index') }}" class="full-width">
												<div class="navLateral-body-cl">
													<i class="zmdi zmdi-balance"></i>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													Zone of tires
												</div>
											</a>
										</li>
										<li class="full-width">
											<a href="#" class="full-width">
												<div class="navLateral-body-cl">
													<i class="zmdi zmdi-truck"></i>
												</div>
												<div class="navLateral-body-cr hide-on-tablet">
													Oversa
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-shopping-cart"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											Ventas
										</div>
									</a>
								</li>
								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="#" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-store"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											Historial
										</div>
									</a>
								</li>
								<li class="full-width divider-menu-h"></li>
								<li class="full-width">
									<a href="{{ route('users') }}" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-accounts"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											Usuarios
										</div>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</section>
			<!---------- fin - inicio ------------>

			<!--========= inicio - contenido =========-->
			<div class="page-container" style="padding: 5px; display: table-cell; position: relative;">
				@yield('content')			
			</div>
			<!---------- fin - contenido   ---------->
		</div>

		<script type="text/javascript" src="js/layout/script.js"></script>
		@yield('scripts')
	</body>
</html>