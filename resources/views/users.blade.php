@extends('public/layout')

@section('title') Usuarios @endsection

@section('resources-page')
	<!--Datatables-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
	<!--Sweetalert-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css"/>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
	<!--Validator-->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
	<div class="content-page">
		<div style="color: #A1A1A1">Usuarios registrados</div>
		<div style="margin: 25px 0">
			<button class="btn" id="btn-AddUser" data-toggle="modal" data-target="#mdl-user" style="background: #3ac47d; color: #ffffff; font-weight: bold;">
				<i class="zmdi zmdi-plus"></i>
				Agregar Usuario
			</button>
		</div>

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
				
			</tbody>
		</table>

		<div class="modal fade" id="mdl-user"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"><span id="txt-titleModal">Registrar nuevo usuario</span></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<form id="create-user">
						@csrf
				      	<div class="p-30">
					      	<div class="form-group">
						      	<label for="inp-name">Nombre</label>
						        <input id="inp-name" name="name" class="form-control" type="text" >
					      	</div>
					      	<div class="form-group">
						        <label for="inp-last_name">Apellido</label>
						        <input id="inp-last_name" name="last_name" class="form-control" type="text">
					      	</div>
					      	<div class="form-group">
						        <label for="inp-email">Correo</label>
						        <input id="inp-email" name="email" class="form-control" type="text">
					      	</div>
					    </div>
					    <button id="submit-createUser" class="d-none"></button>
			      	</form>
			      </div>
			      <div class="modal-footer d-flex justify-content-around">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			        <button id="btn-save" data-submit="create" class="btn btn-primary"><span id="txt-save">Guardar</span></button>
			      </div>
			    </div>
			  </div>
		</div>

	</div>
@endsection

@section('scripts')
	<script src="js/users.js"></script>
@endsection 