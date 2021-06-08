@extends('products.layout')

@section('name-branch')	
	<div style="color: #A1A1A1">
		Productos en inventario <b>Zone</b>
	</div>
@endsection

@section('buttons-actions')
	<div style="margin: 25px 0">
		@if(strtolower(getBranchName()) == 'zone of tires')
			@include('products.partials.buttons')
		@endif
	</div>
@endsection


@section('table-products')
	<table id="tbl-product-zone" class="table table-bordered display responsive nowrap" cellspacing="0" width="100%">
		<thead class="thead-light">
			<tr>
				<th>Medida</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Existencia</th>
				<th>Precio</th>
				@if(strtolower(getBranchName()) == 'zone of tires')
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
	@if(strtolower(getBranchName()) == 'zone of tires')
		@include('products.partials.modals')
	@endif
@endsection

@section('script-branch')
	@if(strtolower(getBranchName()) == 'zone of tires')
		<script type="text/javascript" src="js/products-zone.js"></script>
	@endif
@endsection
