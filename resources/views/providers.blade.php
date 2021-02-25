@extends('public/layout')

@section('title') Proveedores @endsection


@section('resources-page')
@endsection

@section('content')
	<div class="content-page">
		<h4>Lista de proveedores</h4>
		<table id="myTable" class="table table-bordered">
				<thead class="thead-light">
					<tr>
						<th>Nombre</th>
						<th>Contacto</th>
						<th>Cuenta</th>
						<th>Telefono</th>
						<th>Nextel</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Armando Gonzales</td>
						<td>Julian Hernandez</td>
						<td>7665</td>
						<td>664711876</td>
						<td>664876</td>
					</tr>
				</tbody>
		</table>
	</div>
@endsection

@section('scripts')
@endsection