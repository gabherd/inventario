@extends('public/layout')

@section('title') Cuenta @endsection

@section('resources-page')
	<!--Sweetalert-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css"/>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
	<!--CSS personal-->
	<link rel="stylesheet" href="css/account-settings.css">
@endsection

@section('content')
	<div class="content-page">
		<div class="content-info">
			<br>
			<br>
			<br> 
			<form id="update-account" action="{{ route('account-settings.update',  Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<!--div class="form-group d-flex align-items-center flex-column">
					<img id="img-img_user" src="data:image/*;base64,{{ base64_encode( Auth::user()->avatar ) }}" height="150" width="150"  class="rounded-circle"></img>
					<input  class="d-none" id="inp-img_user" accept="image/*" type="file" name="user-img">
					<div id="btn-img_change" class="btn btn-danger mt-1">Cambiar imagen</div>
				</div-->
				<div class="form-group">
					<label for="inp-user_name">Nombre</label>
					<input id="inp-user_name" class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Nombre">
				</div>
				<div class="form-group">
					<label for="inp-user_lname">Apellido</label>
					<input id="inp-user_lname" class="form-control" type="text" name="last_name" value="{{ Auth::user()->last_name }}" placeholder="Apellido">
				</div>
				<hr>
				<div class="form-group">
					<label for="inp-user_email">Correo</label>
					<input class="form-control" type="text" name="user-correo" value="{{ Auth::user()->email }}" placeholder="Correo" readonly>
				</div>
					    <button id="submit-createUser" class="d-none"></button>
				
				<div class="d-flex justify-content-center">
					<button id="btn-save" data-submit="create" data-id="{{ Auth::user()->id }}" class="btn btn-success px-3" >Guardar</button>
				</div>
			</form>
			<hr>
			<div class="form-group">
				<label for="inp-user_lname">Contraseña</label><br>
				<div id="open-modal-password" class="btn btn-danger" data-toggle="modal" data-target="#mdl-user">Cambiar contraseña</div>
			</div>
		</div>

		<div class="modal fade" id="mdl-user"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"><span id="txt-titleModal">Cambiar contraseña</span></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<form id="change-password">
						@csrf
				      	<div class="p-30">
					      	<div class="form-group">
						    	<label>Contraseña actual</label>
						        <input name="current_password" class="form-control" type="password">
					      	</div>
					      	<div class="form-group">
						        <label>Nueva contraseña</label>
						        <input name="new_password" class="form-control" type="password">
					      	</div>
					      	<div class="form-group">
						        <label>Repetir contraseña</label>
						        <input name="confirm_password" class="form-control" type="password">
					      	</div>
					    </div>
					    <button id="submit-changePassword" class="d-none"></button>
			      	</form>
			      </div>
			      <div class="modal-footer d-flex justify-content-around">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			        <button id="btn-changePassword" data-submit="create" class="btn btn-primary">Guardar</button>
			      </div>
			    </div>
			  </div>
		</div>

	</div>
@endsection


@section('scripts')
	<script type="text/javascript" src="js/account-settings.js"></script>
@endsection
																														