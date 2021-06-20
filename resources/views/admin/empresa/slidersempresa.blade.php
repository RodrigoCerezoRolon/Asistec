@extends('home')
@section('contenido')

<script src="{{asset('js/sliderempresa.js')}}"></script>
<div class="container my-5">
<h4 class="text-center" >Editar Sliders</h4>
<div class="float-right mb-3">
    <a href="" class="btn btn-success" data-toggle="modal" data-target="#modalagregar"><i class="fas fa-plus"></i></a>
</div>
<table class="table">
    <th>Orden</th>
    <th>Imagen</th>
    <th>Texto</th>
    <th>Acciones</th>
     @foreach ($sliders as $slide)
<tr>
<td>{{$slide->orden}}</td>

<td style="width: 500px">
  <img src="{{asset(Storage::url($slide->imagen))}}" class="img-fluid" width="300px">
</td>
<td>
  {!!$slide->texto!!}
</td>
    <td><button class="btn btn-info" href="" onclick="editarslider({{$slide->id}})" data-toggle="modal" data-target="#modaleditar" ><i class="fas fa-pencil-alt"></i></button>
        <a class="btn btn-danger " onclick="eliminarslider({{$slide->id}})"><i class="fas fa-trash-alt" style="color: white"></i></a></td>
    @endforeach 
</tr>
</table>
</div>
 <!-- Agregar -->
<div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-labelledby="modalagregar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Slide</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="agregarslider">
          
            <input type="hidden" value="empresa" name="pagina" id="pagina">
            
        <div class="modal-body">
          <div class="form-group">
            <label>Orden</label>
            <input type="text" name="orden" id="orden" class="form-control" required>
            <small id="" class="form-text text-muted">Ingrese orden, ejemplo: AA,AB,AC,AD</small>
            <label>Imagen</label>
            <input type="file" class="form-control-file" name="imagen" id="imagen" required>
            <small id="" class="form-text text-muted">Resolucion 1366 * 344px</small>
            <label>Texto</label>
            <textarea id="summernote"  name="texto"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success agregar-slide" >
            <span class="spinner-border spinner-border-sm d-none"></span>
            <span class="btn-text"> Agregar Slide</span>
           
          </button>
        </div>
        </form>
      </div>
    </div>
</div>
  <!--Editar-->
  <div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Editar Slide</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="actualizarslider" enctype="multipart/form-data">
            {{-- <input type="hidden" name="_method" value="POST"> --}}
            <input type="hidden" value="empresa" name="pagina" id="pagina">
            <input type="hidden" name="id" id="id" value="">

        <div class="modal-body">
          <div class="form-group">
							<label for="email2">Orden</label>
							<input type="text" class="form-control" name="orden" id="editar-orden" placeholder="">
							<small id="editar-orden2" class="form-text text-muted">Ingrese orden, ejemplo: AA,AB,AC,AD</small>
              <label>Imagen</label>
              <small id="" class="form-text text-muted">Resolucion 1366 * 344px</small>
              <img id="preview-img" class="img-fluid" src=""> 
              <input class="form-control-file" type="file" name="editar-imagen" id="editar-imagen">
               <label>Texto</label>
               <textarea id="summernote-edit"  name="texto"></textarea>

          </div>
         
        <br>
          
       
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
           
          <button type="submit" class="btn btn-success">Editar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection
