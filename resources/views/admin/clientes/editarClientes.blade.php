@extends('home')
@section('contenido')
    <script src="{{asset('js/clientes.js')}}"></script>
    <div class="container my-5">
        <div class="row">
            <!--Clientes-->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Clientes
                        <div class="float-right">
                            <button class="btn btn-outline-info" data-toggle="modal" data-target="#agregar">
                                <i class="fas fa-plus"></i>
                                Agregar Cliente
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table ">
                            <thead>
                                <th>Orden</th>
                                <th>Logo</th>
                                <th>Accion</th>
                            </thead>
                            <tbody>
                                @foreach ($clientes as $cliente)
                                <tr>
                                    <td>
                                        {{$cliente->orden}}
                                    </td>
                                    <td>
                                    <img src="{{asset(Storage::url($cliente->imagen))}}" class="img-fluid" width="150px">
                                    </td>
                                    
                                    <td>
                                        <div class="form-button-action">
                                            <button   class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#editar" onclick="editarCliente({{$cliente->id}})">
                                                <i class="fa fa-edit"></i>
                                                </button>
        
                                                <button    class="btn btn-link btn-danger  "  onclick="eliminarCliente({{$cliente->id}})" >
                                                <i class="fa fa-times"></i>
                                                </button>        
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Agregar -->
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Agregar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="agregarCliente" enctype="multipart/form-data">  
            @csrf
        <div class="modal-body">
            <label>Orden</label>
            <input type="text" class="form-control" name="orden">
            <label>Logo Cliente</label>
            <br>
            <img class="img-fluid" src="{{asset(Storage::url('images/noImg.jpg'))}}" width="200px" id="previewImgCliente">

            <input type="file" class="form-control-file" name="imagen" id="imgCliente">
            <small class="text-muted"><strong> Resolucion Recomendada 200px *  200px </strong> </small>
            <br>
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Agregar Cliente</button>
        </div>
        </form>
      </div>
    </div>
</div>
<!-- Editar -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Editar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="actualizarCliente">
            <input type="hidden" id="id" value="">
            @csrf
        <div class="modal-body">
            <label>Orden</label>
            <input type="text" class="form-control" name="orden" id="ordenedit">
            <label>Imagen</label>
            <img src="" id="preview" class="img-fluid" width="150px">
            <input type="file" class="form-control-file" name="imagenedit" id="imagenedit" >
            <small class="text-muted"><strong> Resolucion Recomendada 200px * 200px  </strong> </small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Editar Cliente</button>
        </div>
        </form>
      </div>
    </div>
</div>
<script>
    const fileInput= document.getElementById('imgCliente');
    const img=document.getElementById('previewImgCliente')
    fileInput.addEventListener('change',(e)=>{
        const file= e.target.files[0];
        const fileReader= new FileReader();
        fileReader.readAsDataURL(file);
        fileReader.addEventListener('load',(e)=>{
        img.setAttribute('src',e.target.result);
        });
    });
    const fileInputEdit= document.getElementById('imagenedit');
    const imgEdit=document.getElementById('preview')
    fileInputEdit.addEventListener('change',(e)=>{
        const fileEdit= e.target.files[0];
        const fileReaderEdit= new FileReader();
        fileReaderEdit.readAsDataURL(fileEdit);
        fileReaderEdit.addEventListener('load',(e)=>{
            imgEdit.setAttribute('src',e.target.result);
        });
    });
</script>
@endsection