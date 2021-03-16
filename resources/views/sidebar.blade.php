@include('public/layout')

@section('sidebar')
	<div class="full-width navLateral" style="display: table-cell;">
		<div style="position: absolute; width: 230px; top: 10;">
			<div class="full-width navLateral-body" style="position: relative;">
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
						<li class="full-width">
							<a href="#" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-chart"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									Historial
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="proveedores" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-truck"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									Proveedores
								</div>
							</a>
						</li>
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
	</div>
@endsection