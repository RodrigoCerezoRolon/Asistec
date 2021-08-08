@extends('home')
@section('contenido')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        .select2-container {
    width: 100% !important;
}
    </style>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Editar Sector
                        <button class="btn btn-outline-info float-right" data-toggle="modal" data-target="#modalAgregarsector">
                            <i class="fas fa-plus"></i>
                            Agregar Sector
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>
                                    Orden
                                </th>
                                <th>
                                    Titulo
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($sectores as $sector)
                                    <tr>
                                        <td>{{$sector->orden}}</td>
                                        <td>{{$sector->titulo}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button   class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#modalEditarsector" onclick="editarsector({{$sector->id}})">
                                                    <i class="fa fa-edit"></i>
                                                </button>
            
                                                <button    class="btn btn-link btn-danger"  onclick="eliminarSector({{$sector->id}})" >
                                                    <i class="fa fa-times"></i>
                                                </button>        
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Agregar-->
    <div class="modal fade" id="modalAgregarsector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Sector</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('sectores.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <h6>Orden</h6>
                    <input type="text" class="form-control" name="orden">
                    <h6>Titulo</h6>
                    <input type="text" class="form-control" name="titulo" required>
                    <label for="">Titulo Ingles</label>
                    <input type="text" class="form-control" name="titulo_en" required>
                    <label for="">Titulo Italiano</label>
                    <input type="text" class="form-control" name="titulo_it" required>  
                    <h6>Imagen</h6>
                    <input type="file" name="imgSector">
                  
                        <h6>Seleccionar Soluciones</h6>
                        <select class="js-example-basic-multiple form-control" name="soluciones[]" multiple="multiple">
                           @foreach ($soluciones as $solucion)
                               <option value="{{$solucion->id}}">{{$solucion->titulo}}</option>
                               ...
                           @endforeach
                        </select>
                   
                    <h6>Seleccionar Tipo</h6>
                    <select class="form-control" name="tipo">
                        <option value="1">Empresa</option>
                        <option value="2">Sector</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!-- Modal Editar-->
    <div class="modal fade" id="modalEditarsector" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Sector</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="formEdit" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id_sector">
                    <h6>Orden</h6>
                    <input type="text" class="form-control" name="orden" id="ordenSector">
                    <h6>Titulo</h6>
                    <input type="text" class="form-control" name="titulo" id="tituloSector">
                    <label for="">Titulo Ingles</label>
                    <input type="text" class="form-control" name="titulo_en" id="tituloSectorEn" required>
                    <label for="">Titulo Italiano</label>
                    <input type="text" class="form-control" name="titulo_it" id="tituloSectorIt" required>  
                    <h6>Imagen</h6>
                    <img id="previewSector" class="img-fluid">
                    <br>
                    <input type="file" name="imgSectore">
                    {{-- <h6>Seleccionar Solucion</h6>
                    <select class="form-control" name="solucion_id" id="solucionSector">
                        @foreach ($soluciones as $solucion)
                            <option value="{{$solucion->id}}">{{$solucion->titulo}}</option>
                        @endforeach
                    </select> --}}
                    <h6>Seleccionar Soluciones</h6>
                        <select class="js-example-basic-multiple form-control" id="solucionesEdit" name="soluciones[]" multiple="multiple">
                           @foreach ($soluciones as $solucion)
                               <option value="{{$solucion->id}}">{{$solucion->titulo}}</option>
                               ...
                           @endforeach
                        </select>
                    <h6>Seleccionar Tipo</h6>
                    <select class="form-control" name="tipo" id="tipoSector">
                        <option value="1">Empresa</option>
                        <option value="2">Sector</option>
                    </select>
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
        $(function(){
            $('.js-example-basic-multiple').select2();
            $('#formEdit').on('submit',(e)=>{
                e.preventDefault();
                let id=$('#id_sector').val();
                let form= new FormData($('#formEdit')[0]);
                form.append('_method','PUT');
                $.ajax({
                    type: "POST",
                    url: location.href+"/actualizarSector/"+id,
                    data: form,
                    processData:false,
                    contentType:false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal("Sector Editado !","","success");
                        setTimeout(function(){location.reload()},1500);
                    },
                    error: function(response){
                        console.log(response);
                        swal("Algo salio mal","","error");
                    }
                });
            });
        });
        function editarsector(id){
            const path='../../storage/';
            $.ajax({
                type: "GET",
                url: location.href+"/editarSector/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response);
                    let soluciones=[];
                    $('#id_sector').val(id);
                    $('#ordenSector').val(response.orden);
                    $('#tituloSector').val(response.titulo);
                    $('#tituloSectorEn').val(response.titulo_en);
                    $('#tituloSectorIt').val(response.titulo_it);
                    $('#previewSector').attr('src',path+response.imagen);
                    // $('#solucionesEdit').val([response.soluciones[0]]);

                    // response.soluciones.forEach(element => soluciones.push(element));
                    $('#solucionesEdit').val(response.soluciones);
                    $('#solucionesEdit').trigger('change');
                    $('#tipoSector').val(response.tipo);
                },
                error: function(response){
                    console.log(response);
                    swal("Algo salió mal","","error");
                }
            });
        }
        function eliminarSector(id){
            swal({
            title: "Esta seguro/a de eliminar un Sector?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "DELETE",
                        url: location.href+"/eliminarSector/"+id,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            swal("Poof! Sector Eliminado!","","success");
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