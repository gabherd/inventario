@extends('public/layout')

@section('title') Productos @endsection

@section('resources-page')
	<!--DataTables-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
	<!--Sweetalert-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css"/>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
	<!--Token-->
	<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}"> 
	<link rel="stylesheet" href="css/products.css">
	<!--Ratatable responsive-->
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
@endsection

@section('content')
	<div class="content-page">
		
		<div style="color: #A1A1A1"> 
			Productos en inventario <b>Zone</b>
		</div>
		<div style="margin: 25px 0">
			
		</div>

		<table id="tbl-product-zone" class="table table-bordered display responsive nowrap" cellspacing="0" width="100%">
			<thead class="thead-light">
				<tr>
					<th>Medida</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Existencia</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		
	</div>


@endsection

@section('scripts')
	<script type="text/javascript" src="js/products.js"></script>
@endsection
	


																														