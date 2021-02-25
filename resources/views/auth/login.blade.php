<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="css/login.css">
	<title>Zone of tires | Iniciar sesion</title>
</head>
	<body>
		<div class="login shadow-sm">
			<div class="d-flex justify-content-center">
				<img src="img/user.svg" height="100">
			</div>
			<div>
				<form method="POST" action="{{ route('login') }}">
					@csrf
					<div class="text-center" style="margin: 10px 0; color: #afafaf">Iniciar sesion</div>
					<div>
						<div class="form-group">
							<input id="inp-user_name" class="form-control" type="text" name="email" placeholder="Usuario">
							@error('username')
								<span class="invalid-feedback is-invalid" role="alert">
									<strong>{{ $message }}</strong>
		   							{!! $errors->first('username', ':message<br>') !!}

								</span>
							@enderror
						</div>
						<div class="form-group">
							<input id="inp-user_password" class="form-control" type="password" autocomplete="current-password" name="password" placeholder="Contraseña">
							@error('password')
								<span class="invalid-feedback is-invalid" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<button class="btn btn-success w-100" type="submit">Entrar</button>
				</form>
			</div>
		</div>
	</body>
</html>