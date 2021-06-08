@extends('products.layout')

@section('name-branch')	
	<div style="color: #A1A1A1">
		Productos en inventario <b>Oversa</b>
	</div>
@endsection

@section('buttons-actions')
	<div style="margin: 25px 0">
		@if(strtolower(getBranchName()) == 'over')
			@include('products.partials.buttons')
		@endif
	</div>
@endsection

@section('table-products')
	<table id="tbl-product-over" class="table table-bordered display responsive nowrap" cellspacing="0" width="100%">
		<thead class="thead-light">
			<tr>
				<th>Codigo</th>
				<th>Medida</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Apartado</th>
				<th>Existencia</th>
				<th>Precio</th>
				<th>Precio distribuidor</th>
				<th>Precio distribuidor top</th>
				<th>Promocion</th>
				@if(strtolower(getBranchName()) == 'over')
					<th>Acciones</th>
				@else
					<th> </th>
				@endif
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
@endsection

@section('modals')
	@if(strtolower(getBranchName()) == 'over')
		@include('products.partials.modals')
	@endif
@endsection

@section('script-branch')
	@if(strtolower(getBranchName()) == 'over')
		<script type="text/javascript" src="js/products-over.js"></script>
	@endif
@endsection


