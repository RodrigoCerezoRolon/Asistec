@extends('home')
@section('contenido')

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
     <div class="container my-5 ">
        <div class="row">
            <!--Seccion Empresa-->
            <div class="col-md-12">
                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Seccion Soluciones
                    </div>
                    <div class="card-body">
                        <form action="{{route('inicio.actualizarSeccionEmpresa',$seccionSolucion->id)}}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-12">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="titulo" value="{{$seccionSolucion->titulo}}">
                                    <label>Titulo Ingles</label>
                                    <input type="text" class="form-control" name="titulo_en" value="{{$seccionSolucion->titulo_en}}">
                                    <label>Titulo Italiano</label>
                                    <input type="text" class="form-control" name="titulo_it" value="{{$seccionSolucion->titulo_it}}">
                                    <label>Texto</label>
                                    <textarea id="editor" name="texto">{!!$seccionSolucion->texto!!}</textarea>
                                    <label>Texto Ingles</label>
                                    <textarea id="editor" name="texto_en">{!!$seccionSolucion->texto_en!!}</textarea>
                                    <label>Texto Italiano</label>
                                    <textarea id="editor" name="texto_it">{!!$seccionSolucion->texto_it!!}</textarea>
                                    <label>Imagen</label>
                                    <img class="img-fluid" src="{{asset(Storage::url($seccionSolucion->imagen))}}">
                                    <input type="file" class="form-control-file" name="imagenSolucion">
                                    <small class="text-muted">Resolucion Recomendada 1366px * 268px</small>
                                </div>
                                
                            </div>    
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-outline-info">
                            Modificar
                        </button>
                    </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Seccion Empresa
                    </div>
                    <div class="card-body">
                        <form action="{{route('inicio.actualizarSeccionEmpresa',$seccionEmpresa->id)}}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-12">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="titulo" value="{{$seccionEmpresa->titulo}}">
                                    <label>Titulo Ingles</label>
                                    <input type="text" class="form-control" name="titulo_en" value="{{$seccionEmpresa->titulo_en}}">
                                    <label>Titulo Italiano</label>
                                    <input type="text" class="form-control" name="titulo_it" value="{{$seccionEmpresa->titulo_it}}">
                                    <label>Texto</label>
                                    <textarea id="editor" name="texto">{!!$seccionEmpresa->texto!!}</textarea>
                                    <label>Texto Ingles</label>
                                    <textarea id="editor" name="texto_en">{!!$seccionEmpresa->texto_en!!}</textarea>
                                    <label>Texto Italiano</label>
                                    <textarea id="editor" name="texto_it">{!!$seccionEmpresa->texto_it!!}</textarea>
                                    <label>Imagen</label>
                                    <img class="img-fluid" src="{{asset(Storage::url($seccionEmpresa->imagen))}}">
                                    <input type="file" class="form-control-file" name="imagenEmpresa">
                                    <small class="text-muted">Resolucion Recomendada 1366px * 268px</small>
                                </div>
                                
                            </div>    
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-outline-info">
                            Modificar
                        </button>
                    </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Seccion Mantenimiento
                    </div>
                    <div class="card-body">
                        <form action="{{route('inicio.actualizarSeccionEmpresa',$seccionMantenimiento->id)}}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-12">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="titulo" value="{{$seccionMantenimiento->titulo}}">
                                    <label>Titulo Ingles</label>
                                    <input type="text" class="form-control" name="titulo_en" value="{{$seccionMantenimiento->titulo_en}}">
                                    <label>Titulo Italiano</label>
                                    <input type="text" class="form-control" name="titulo_it" value="{{$seccionMantenimiento->titulo_it}}">
                                    <label>Texto</label>
                                    <textarea id="editor" name="texto">{!!$seccionMantenimiento->texto!!}</textarea>
                                    <label>Texto Ingles</label>
                                    <textarea id="editor" name="texto_en">{!!$seccionMantenimiento->texto_en!!}</textarea>
                                    <label>Texto Italiano</label>
                                    <textarea id="editor" name="texto_it">{!!$seccionMantenimiento->texto_it!!}</textarea>
                                    <label>Imagen</label>
                                    <img class="img-fluid" src="{{asset(Storage::url($seccionMantenimiento->imagen))}}">
                                    <input type="file" class="form-control-file" name="imagenMantenimiento">
                                    <small class="text-muted">Resolucion Recomendada 1366px * 268px</small>
                                </div>
                                
                            </div>    
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-outline-info">
                            Modificar
                        </button>
                    </form>
                    </div>
                </div>
            </div> 
            <!--Marcas-->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Marcas
                        <div class="float-right">
                            <button class="btn btn-success" data-toggle="modal" data-target="#ModalAgregarMarca"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table my-5">
                            <th>Orden</th>
                            <th>Icono</th>
                            <th>Accion</th>
                            @foreach($marcas as $marca)
                            <tr>
                              <td>
                              {{$marca->orden}}  
                              </td>
                              <td>
                                <img src="{{asset(Storage::url($marca->imagen))}}" class="img-fluid">
                              </td>
                              <td>
                                <button class="btn btn-info" onclick="editarMarca({{$marca->id}})"  data-toggle="modal" data-target="#ModalEditarMarca"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger" onclick="eliminarMarca({{$marca->id}})"><i class="fas fa-trash-alt"></i></button>
                              </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!--Agregar Marca-->
    <div class="modal fade" id="ModalAgregarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
        </div>
        <form id="agregarMarca">
            <div class="modal-body">
                <input type="hidden" id="id">
                <label>Orden</label>
                <input id="orden" type="text" class="form-control">
                
                <label>Imagen</label>
                <input type="file" class="form-control-file" id="marca_img">
                <small id="img_marca" class="form-text text-muted">Tamaño recomendado: 120px x 120px</small>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Agregar Marca</button>
            </div>
        </form>
            </div>
        </div>
    </div>
    <!--Editar Marca-->
    <div class="modal fade" id="ModalEditarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
        </div>
        <form id="actualizarMarca">
            <div class="modal-body">
                <input type="hidden" id="id">
                <label>Orden</label>
                <input id="orden_editar" type="text" class="form-control">
                
                <label>Imagen</label>
                <img id="preview-imagen" src="" width="120px">
                <input type="file" class="form-control-file" id="img_marca_editar">
                <small id="" class="form-text text-muted">Tamaño recomendado: 120px x 120px</small>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
            </div>
        </div>
    </div>
   <script>
       $(document).ready(function() {
            $('textarea').summernote({
                lang: 'es-ES',
                height: 120,
                    fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
                    toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontNames', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']]
                    
                    ]
            });
            $('#agregarMarca').on('submit', function (e) {
                e.preventDefault();
                var form= new FormData();
                var orden=$('#orden').val();
                var marca=$('#marca_img');
                form.append('img_marca',marca[0].files[0]);
                form.append('orden',orden);
                $.ajax({
                    type: "POST",
                    url: "./agregarMarca",
                    data: form,
                    processData:false,
                    contentType:false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal("Marca Agregada!","","success");
                        setTimeout(function(){location.reload()},1500);
                    },
                    error: function(response){
                        console.log(response);
                        swal("Algo salio mal","","error");
                    }
                });
            });
            $('#actualizarMarca').on('submit', function (e) {
                e.preventDefault();
                var id=$('#id').val();
                var form= new FormData();
                var orden= $('#orden_editar').val();
                var marca=$('#img_marca_editar');
                form.append('orden',orden);
                form.append('img_marca_edit',marca[0].files[0]);
                form.append('_method', 'PUT');
                $.ajax({
                    type: "POST",
                    url: "actualizarMarca/"+id,
                    data: form,
                    processData:false,
                    contentType:false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal("Marca Editada !","","success");
                        setTimeout(function(){location.reload()},1500);
                    },
                    error: function(response){
                        console.log(response);
                        swal("Algo salio mal","","error");
                    }
                });
            });
        });
        function editarMarca(id) {
            $.ajax({
                type: "get",
                url: "editarMarca/"+id,
                success: function (response) {
                    //console.log(response);
                    $('#id').val(id);
                    $('#orden_editar').val(response.orden);
                    var path= '../../storage/';
                    $('#preview-imagen').attr('src',path+response.imagen);
                },
                error: function(response){
                    console.log(response);
                }
            });
        }
        function eliminarMarca(id){
            swal({
                title: "Esta seguro/a de eliminar una marca?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "DELETE",
                        url: "eliminarMarca/"+id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            swal("Poof! Marca Eliminada!","","success");
                            setTimeout(function(){location.reload()},1500);
                        },
                        error: function(response){
                            console.log(response);
                            swal("Algo salió mal","","error");
                        }
                    });

                } else {
                swal("No se borrado nada!");
                }
            });

        }
   </script>
@endsection