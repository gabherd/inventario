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
