@extends('public/layout')

@section('resources-page')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="css/dashboard.css">
@endsection

@section('content')
	<div>
		<div class="row text-white">
			<div class="col-md-4 col-sm-13 ">
				<div style="background: #00C0EF; " class="box-header">
					<div style="">
						<div class="qty-product">150</div>
						<div class="qty-description">Ventas</div>
					</div>
					<img src="img/bolsa-de-la-compra.svg" height="80">
				</div>
			</div>
			<div class="col-md-4 col-sm-6 ">
				<div style="background: #00A65A;" class="box-header">
					<div>
						<div class="qty-product">{{ $productsStock }}</div> 
						<div class="qty-description">productos en stock</div>
					</div>
					<img src="img/box.svg" alt="" height="80">
				</div>
			</div>
			<div class="col-md-4 col-sm-6 ">
				<div style="background: #DD4B39;" class="box-header">
					<div>
						<div class="qty-product">{{ $productsOut }}</div>
						<div class="qty-description">Productos agotados</div>
					</div>
					<img src="img/pie-chart.svg" alt="" height="80">
				</div>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col">
				<div style="border-radius: 5px; padding: 10px; background: #fff">
					<div style="display: flex; justify-content: space-between;">
						<div class="title-box">Productos mas vendidos</div>
						<div style="display: none">
							<img src="img/settings.svg" alt="" width="17" style="opacity: .7">
						</div>
					</div>
					<div id="piechart" style="width: 100%; height: 200px;"></div>
				</div>
			</div>
			<div class="col">
				<div style="border-radius: 5px; padding: 10px; background: #fff">
					<div style="display: flex; justify-content: space-between;">
						<div class="title-box">Productos agotados y por agotarse</div>
						<div style="display: none">
							<img src="img/settings.svg" alt="" width="17" style="opacity: .7">
						</div>
					</div>
					<div style="width: 100%; height: 200px;">
						<table id="tbl-emty-stock" class="table table-bordered">
							<thead class="thead-light">
								<tr>
									<th>Producto</th>
									<th>Stock</th>
								</tr>
							</thead>
							<tbody style="">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col">
				<div style="border-radius: 5px; padding: 10px; background: #fff">
					<div class="title-box">Ventas por dia</div>
					<div id="chart_div" style="width: 100%; height: 500px;"></div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

	<script type="text/javascript" src="js/dashboard.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

@endsection