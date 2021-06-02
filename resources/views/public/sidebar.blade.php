<div class="sidebar">
	<div class="user-access">
		@if(Auth::user()->isAdmin == 1)
			Administrador

		@endif
	</div>
	<div class="sidebar-body">
		<div class="sidebar-content">
			@if( Request::is('/'))
				<div class="url-active"></div>
			@endif
			<a href="/" class="sidebar-menu">
				<div class="menu-icon">
					<i class="zmdi zmdi-view-dashboard"></i>
				</div>
				<div class="menu-title">Dashboard</div>
			</a>
		</div>
		<div class="sidebar-content">
			@if( Request::is('zone'))
				<div class="url-active"></div>
			@endif
			<a href="{{ route('zone') }}" class="sidebar-menu">
				<div class="menu-icon">
					<i class="zmdi zmdi-assignment"></i>
				</div>
				<div class="menu-title">Zone</div>
			</a>
		</div>
		<div class="sidebar-content">
			@if( Request::is('over'))
				<div class="url-active"></div>
			@endif
			<a href="{{ route('over') }}" class="sidebar-menu">
				<div class="menu-icon">
					<i class="zmdi zmdi-view-dashboard"></i>
				</div>
				<div class="menu-title">Over</div>
			</a>
		</div>
		<div class="sidebar-content">
			@if( Request::is('usuarios'))
				<div class="url-active"></div>
			@endif
			<a href="{{ route('users.index') }}" class="sidebar-menu">
				<div class="menu-icon">
					<i class="zmdi zmdi-accounts"></i>
				</div>
				<div class="menu-title">Osuarios</div>
			</a>
		</div>
	</div>
</div>