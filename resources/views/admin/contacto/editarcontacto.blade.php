@extends('home')
@section('contenido')
<script src="{{asset('js/contactos.js')}}"></script>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Datos de Contacto
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Dato</th>
                            <th>Texto</th>
                            <th>Accion</th>
                            <tbody>
                                @foreach ($contactos as $contacto)
                                <tr>
                                    <td>
                                        {{$contacto->dato}}
                                    </td>
                                    <td>
                                        {{$contacto->texto}}
                                    </td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal" data-target="#editar" onclick="editarContacto({{$contacto->id}})" ><i class="fas fa-pencil-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Iconos
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <form id="formActualizarIconoSup">
                                <input type="hidden" id="idIcono" value="{{$iconoSup->id}}">
                                <label>Icono Superior</label>
                                <br>
                                <img src="{{asset(Storage::url($iconoSup->icono))}}" class="img-fluid">
                               
                                <input type="file" class="form-control-file" name="iconosup">
                                    <div class="text-center">
                                        <button class="btn btn-info">
                                            Modificar
                                        </button>
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="col-md-6">
                                <form id="formActualizarIconoInf">
                                <input type="hidden" id="idIconoInf" value="{{$iconoInf->id}}">
                                <label>Icono Inferior</label>
                                <br>
                                <img src="{{asset(Storage::url($iconoInf->icono))}}" class="img-fluid">
                                
                                <input type="file" class="form-control-file" name="iconoinf">
                                <div class="text-center">
                                    <button class="btn btn-info">
                                        Modificar
                                    </button>
                                </div>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Editar -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Editar Contacto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="actualizarContacto">
            <input type="hidden" id="id" value="">
            <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="modal-body">
            <label>Dato</label>
            <input type="text" class="form-control" id="dato" disabled>
            <label>Texto</label>
            <input type="text" class="form-control" id="texto">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Editar Contacto</button>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection
