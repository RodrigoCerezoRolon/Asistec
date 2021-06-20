@extends('home')
@section('contenido')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="{{asset('js/metadatos.js')}}"></script>
  <div class="container my-5">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <h3>Editar Metadatos</h3>
                  </div>
                  <div class="card-body">
                    <table class="table ">
                      <th>Keyword</th>
                      <th>Descripción</th>
                      <th>Sección</th>
                      <th>Accion</th>
                      @foreach($metadatos as $metadato)
                      <tr><td>{{$metadato->keyword}}</td><td>{{$metadato->descripcion}}</td><td>{{$metadato->seccion}}</td><td><button class="btn btn-info" data-toggle="modal" data-target="#editar" onclick="editarmetadato({{$metadato->id}})"><i class="fas fa-pencil-alt" style="color: white"></i></button></td></tr>
                      @endforeach
                   </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
    
 

  <!-- Modal -->
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Metadato</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editarmetadato" class="form-group">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="hidden" name="id" id="id" value="">
            <label class="form-label" for="keyword">Keyword</label>
            <input type="text" class="form-control" name="keyword" id="keyword">
            <label class="form-label" for="descripcion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion">
            <label class="form-label" for="seccion">Sección</label>
            <input type="text" class="form-control" name="seccion" id="seccion" disabled>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
