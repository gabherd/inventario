@extends('public/layout')

@section('title') Usuarios @endsection

@section('resources-page')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
@endsection

@section('content')
	<div class="content-page">
		<div style="color: #A1A1A1">Usuarios registrados</div>
		<table id="tbl-users" class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->last_name }}</td>
						<td>{{ $user->email }}</td>
						<td>
							<a href="/articulos/{{$user->id}}/edit" class="btn btn-info">Editar</a>
							<button type='submit' class="btn btn-danger">Borrar</button>
						<td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('scripts')
		<script>
			$(document).ready(function() {
			    $('#tbl-users').DataTable();
			} );
		</script>	
@endsection