@extends('public/layout')

@section('title') Cuenta @endsection

@section('resources-page')
	<link rel="stylesheet" href="css/account-settings.css">
@endsection

@section('content')
	<div class="content-page">
		<div class="content-info">
			<div>
				    <!-- Success message -->
				        @if(Session::has('success'))
				        <div class="alert alert-success">
				            {{Session::get('success')}}
				        </div>
				        @endif
			</div>

			<form action="{{ route('account-settings.update',  Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="form-group d-flex align-items-center flex-column">
					<img id="img-img_user" src="data:image/*;base64,{{ base64_encode( Auth::user()->avatar ) }}" height="150" width="150"  class="rounded-circle"></img>
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
					<input id="inp-user_name" class="form-control" type="text" name="user-correo" value="{{ Auth::user()->email }}" placeholder="Correo" readonly>
				</div>
				<div class="form-group">
					<label for="inp-user_lname">Contraseña</label><br>
					<div class="btn btn-danger">Cambiar contraseña</div>
				</div>
				<div class="d-flex justify-content-center">
					<button class="btn btn-success p-3" >Guardar</button>
					
				</div>
			</form>
		</div>
	</div>
@endsection


@section('scripts')
	<script type="text/javascript" src="js/account-settings.js"></script>
@endsection
																														