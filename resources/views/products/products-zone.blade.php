@extends('products.layout')

@section('name-branch')	
	<div style="color: #A1A1A1">
		Productos en inventario <b>Zone</b>
	</div>
@endsection

@section('buttons-actions')
	<div style="margin: 25px 0">
		@if(strtolower(getBranchName()) == 'zone')
			@include('products.partials.buttons')
		@endif
	</div>
@endsection


@section('table-products')
	<table id="tbl-product-zone" class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>Medida</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Existencia</th>
				<th>Precio</th>
				@if(strtolower(getBranchName()) == 'zone')
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
	@if(strtolower(getBranchName()) == 'zone')
		@include('products.partials.modals')
	@endif
@endsection