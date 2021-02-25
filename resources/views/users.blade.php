@extends('public/layout')

@section('title') Usuarios @endsection


@section('resources-page')
@endsection

@section('content')
	<div class="content-page">
		<div style="color: #A1A1A1">Usuarios registrados</div>
		<table id="myTable" class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Gabriel</td>
					<td>Hernandez</td>
					<td>gabriel@gmail.com</td>
					<td>...</td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection

@section('scripts')


@endsection