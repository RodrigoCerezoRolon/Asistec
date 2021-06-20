@extends('home')
@section('contenido')
@if(session()->has('msj'))
 <script>swal("Se dio de alta el usuario","","success");</script>
@endif
<form class="form-group" id="crearusuario" action="usuarios/crearusuario" method="POST">
    @csrf

    <div class="form-group row">
        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

        <div class="col-md-6">
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="role" class="col-md-4 col-form-label text-md-right">{{__('Role')}}</label>
        <div class="col-md-6">
            <select id="role" name="role" class=" form-control">
                <option value="1">Administrador</option>
                <option value="2">Usuario</option>
            </select>
        </div>
    </div> 
   

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Crear usuario') }}
            </button>
        </div>
    </div>
</form>
@endsection
