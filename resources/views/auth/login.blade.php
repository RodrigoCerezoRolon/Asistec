@extends('layouts.app')

@section('content')

<body class="login">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link href="{{asset('css/azzara.min.css')}}" rel="stylesheet">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
        <form method="POST" action="{{ route('login') }}">
                        @csrf
			<h3 class="text-center">Panel Administrativo <br>Asistec</h3>
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror input-border-bottom" required>
                    <label for="username" class="placeholder">Usuario</label>
                    @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>"El usuario o contraseña es incorrecto"</strong>
                  </span>
                  @enderror
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Contraseña</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
			
				<div class="form-action mb-3">
                <button type="submit" class="btn btn-primary btn-rounded btn-login">
                                    {{ __('Ingresar') }}
                                </button>
					<!-- <a href="#" class="btn btn-primary btn-rounded btn-login">Ingresar</a> -->
				</div>
				
			</div>
        </div>
        </form>
	</div>
	
</body>
@endsection
