@extends('public/layout')


@section('resources-page')
	
@endsection


@section('content')
	<div  style="background: #fff; padding:5px; height: 100%;">
		<div class="" style="width: 70%; margin: auto;">
				<form action="" method="POST">
				    <div class="form-group d-flex align-items-center flex-column">
						<div style="height: 150px; width: 150px; background: #aaf; border-radius: 150px;">
						</div>
						<button class="btn btn-secondary mt-2">Cambiar imagen</button>
					</div>
					<div class="form-group">
						<label for="inp-user_name">Nombre</label>
						<input id="inp-user_name" class="form-control" type="text" name="user-name" value="Usuario">
					</div>
					<div class="form-group">
						<label for="inp-user_lname">Apellido</label>
						<input id="inp-user_lname" class="form-control" type="text" value="Apellido">
					</div>
					<hr>
					<div class="form-group">
						<label for="inp-user_name">Correo</label>
						<input id="inp-user_name" class="form-control" type="text" name="user-name" value="Usuario">
					</div>

					<div class="form-group">
						<label for="inp-user_lname">Contraseña</label><br>
						<button class="btn btn-danger">Cambiar contraseña</button>
					</div>
					<div class="d-flex justify-content-center" style="width: 100%;">
						<button class="btn btn-success p-3" >Guardar</button>
						
					</div>
				</form>
		</div>
	</div>
@endsection


@section('scripts')
	
@endsection
																														