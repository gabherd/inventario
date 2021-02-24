@extends('public/layout')


@section('resources-page')
	<link rel="stylesheet" href="css/account-settings.css">
@endsection

@section('content')
		<div class="" style="width: 70%; margin: auto;">
			<form action="{{ route('account-settings.update',  Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')

				<div class="form-group d-flex align-items-center flex-column">
					<img id="img-img_user" src="img/bolsa.svg" style="height: 150px; width: 150px; background: #aaf; border-radius: 150px; border:none;"></img>
					<input  class="d-none" id="inp-img_user" accept="image/*" type="file" name="user-img">
					<div id="btn-img_change" class="btn btn-danger mt-1">Cambiar imagen</div>
				</div>
				<div class="form-group">
					<label for="inp-user_name">Nombre</label>
					<input id="inp-user_name" class="form-control" type="text" name="user-name" value="{{ Auth::user()->name }}" placeholder="Nombre">
				</div>
				<div class="form-group">
					<label for="inp-user_lname">Apellido</label>
					<input id="inp-user_lname" class="form-control" type="text" name="user-apellido" value="{{ Auth::user()->last_name }}" placeholder="Apellido">
				</div>
				<hr>
				<div class="form-group">
					<label for="inp-user_name">Correo</label>
					<input id="inp-user_name" class="form-control" type="text" name="user-correo" value="{{ Auth::user()->email }}" placeholder="Correo">
				</div>
				<div class="form-group">
					<label for="inp-user_lname">Contraseña</label><br>
					<div class="btn btn-danger">Cambiar contraseña</div>
				</div>
				<div class="d-flex justify-content-center" style="width: 100%;">
					<button class="btn btn-success p-3" >Guardar</button>
					
				</div>
			</form>
		</div>
@endsection


@section('scripts')
	<script type="text/javascript" src="js/account-settings.js"></script>
@endsection
																														