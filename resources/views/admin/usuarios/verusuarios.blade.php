@extends('home')
@section('contenido')
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="{{asset('js/usuarios.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="container my-5">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    Editar Usuarios
                  </div>
                  <div class="card-body">
                      <table class="table ">
                        <th>Usuario</th>
                        <th>Accion</th>
                        @foreach ($usuarios as $usuario)
                        <tr><td>{{$usuario->username}}</td>
                            <td><button class="btn btn-info" data-toggle="modal" data-target="#editarUsuario" onclick="editarUsuario({{$usuario->id}})">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-danger" onclick="eliminarUsuario({{$usuario->id}})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            </td>
                        </tr>
                        @endforeach
                      </table>
                  </div>
              </div>
            </div>
      </div>
  </div>
   
    <!-- Modal -->
<div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="editarUsuario">
                <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="hidden" id="id-user" value="">
          <label for="username">Usuario</label>
          <input type="text" class="form-control" id="username" name="username" disabled>
          <label for="password">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password">
          <label for="role" >Role</label>
          <select id="role" name="role" class="form-control">
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
            </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection
