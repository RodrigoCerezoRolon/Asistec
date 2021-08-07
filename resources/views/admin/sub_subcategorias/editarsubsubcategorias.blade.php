@extends('home')
@section('contenido')
<script src="{{asset('js/subsubcategorias.js')}}"></script>

    <div class="container my-5">
        <div class="row">
             <!--Sub-Subcategorias-->
             <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                        Editar Sub-Subcategorias
                        </div>
                        <div class="float-left">
                            <input type="text" class="form-control" id="search" placeholder="Nombre a Buscar">
                        </div>
                        <div class="float-right">
                            <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalAgregarSubSubCategoria">
                                <i class="fas fa-plus"></i>
                                Agregar Sub-Subcategoria
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table" id="tablaSubSubCategorias">
                            <thead>
                                <th>SubCategoria</th> 
                                <th>Nombre</th>
                                <th>Orden</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if(!$subsubcategorias->isEmpty())
                                @foreach ($subsubcategorias as $subsubcategoria)
                                    <tr>
                                        <td>{{$subsubcategoria->subcategoria->categoria->nombre}} - {{$subsubcategoria->subcategoria->nombre}}</td> 
                                        <td>{{$subsubcategoria->nombre}}</td>
                                        <td>{{$subsubcategoria->orden}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button   class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#modalEditarSubSubCategoria" onclick="editarSubSubCategoria({{$subsubcategoria->id}})">
                                                    <i class="fa fa-edit"></i>
                                                    </button>
            
                                                    <button    class="btn btn-link btn-danger"  onclick="eliminarSubSubCategoria({{$subsubcategoria->id}})" >
                                                    <i class="fa fa-times"></i>
                                                    </button>        
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Agregar SubSubCategoria-->
<div class="modal fade" id="modalAgregarSubSubCategoria" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Sub-SubCategoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formAgregarSubSubCategoria" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">
                <label for="orden">Orden</label>
                <input type="text" class="form-control"  name="orden">
                <label for="tituloedit">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <label for="">Nombre Ingles</label>
                <input type="text" class="form-control" name="nombre_en" required>
                <label for="">Nombre Italiano</label>
                <input type="text" class="form-control" name="nombre_it" required> 
                <label>Subcategorias</label>
                <select class="form-control" name="subcategory_id" required>
                    @if($subcategorias->isEmpty())
                    <option value="" selected>No hay Categorias Cargadas, cargue para continuar</option>
                    @else 
                    <option value="" selected>Seleccione una SubCategoria</option>
                    @foreach ($subcategorias as $subcategoria)
                    <option value="{{$subcategoria->id}}">{{$subcategoria->categoria->nombre}} - {{$subcategoria->nombre}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Agregar</button>
            </div>
        </form>
      </div>
    </div>
</div>
<!--Editar SubSubCategoria-->
<div class="modal fade" id="modalEditarSubSubCategoria" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Editar Sub-SubCategoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formEditarSubSubCategoria" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">
                <input type="hidden" id="id_SubSubCat">
                <label for="orden">Orden</label>
                <input type="text" class="form-control"  name="orden" id="orden_SubSubcat">
                <label for="tituloedit">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre_Subsubcat">
                <label for="">Nombre Ingles</label>
                <input type="text" class="form-control" name="nombre_en" id="nombre_Subsubcat_en" required>
                <label for="">Nombre Italiano</label>
                <input type="text" class="form-control" name="nombre_it" id="nombre_Subsubcat_it" required>  
                <label>Subcategorias</label>
                <select class="form-control" name="subcategory_id" required id="select_subcategoria_edit">
                    @if($subcategorias->isEmpty())
                    <option value="" selected>No hay Categorias Cargadas, cargue para continuar</option>
                    @else 
                    <option value="" selected>Seleccione una SubCategoria</option>
                    @foreach ($subcategorias as $subcategoria)
                    <option value="{{$subcategoria->id}}">{{$subcategoria->categoria->nombre}} - {{$subcategoria->nombre}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Editar</button>
            </div>
        </form>
      </div>
    </div>
</div>
<script>
    $("#search").keyup(function(){
            _this = this;
            // Muestra los tr que concuerdan con la busqueda, y oculta los demás.
            $.each($("#tablaSubSubCategorias tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                   $(this).hide();
                else
                   $(this).show();                
            });
        }); 
    </script>
@endsection