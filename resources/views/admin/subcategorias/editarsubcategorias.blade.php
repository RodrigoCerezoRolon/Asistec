@extends('home')
@section('contenido')
<script src="{{asset('js/subcategorias.js')}}"></script>
    <div class="container my-5">
        <div class="row">
             <!--Subcategorias-->
             <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                        Editar SubCategorias
                        </div>
                        <div class="float-left">
                            <input type="text" class="form-control" id="search" placeholder="Nombre a Buscar">
                        </div>
                        <div class="float-right">
                            <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalAgregarSubCategoria">
                                <i class="fas fa-plus"></i>
                                Agregar Subcategoria
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table" id="tablaSubCategorias">
                            <thead>
                                <th>Categoria</th>
                                <th>Nombre</th>
                                <th>Orden</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if(!$subcategorias->isEmpty())
                                @foreach ($subcategorias as $subcategoria)
                                    <tr>
                                         <td>{{$subcategoria->categoria->nombre}}</td>
                                         <td>{{$subcategoria->nombre}}</td>
                                        <td>{{$subcategoria->orden}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <button   class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#modalEditarSubCategoria" onclick="editarSubCategoria({{$subcategoria->id}})">
                                                    <i class="fa fa-edit"></i>
                                                    </button>
            
                                                    <button    class="btn btn-link btn-danger"  onclick="eliminarSubCategoria({{$subcategoria->id}})" >
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
<!--Agregar SubCategoria-->
<div class="modal fade" id="modalAgregarSubCategoria" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Agregar SubCategoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formAgregarSubCategoria" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">
                <label for="orden">Orden</label>
                <input type="text" class="form-control"  name="orden">
                <label for="tituloedit">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <label>Categorias</label>
                <select class="form-control" name="category_id" required>
                    @if($categorias->isEmpty())
                    <option value="" selected>No hay Categorias Cargadas, cargue para continuar</option>
                    @else 
                    <option value="" selected>Seleccione una Categoria</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
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
<!--Editar SubCategoria-->
<div class="modal fade" id="modalEditarSubCategoria" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Editar SubCategoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formActualizarSubCategoria" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">
                <input type="hidden" id="id_SubCat">
                <label for="orden">Orden</label>
                <input type="text" class="form-control"  name="orden" id="orden_subcat">
                <label for="tituloedit">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre_subcat">
                <label>Categorias</label>
                <select class="form-control" name="category_id" required id="select_subcategoria">
                    @if($categorias->isEmpty())
                    <option value="" selected>No hay Categorias Cargadas, cargue para continuar</option>
                    @else 
                    <option value="" selected>Seleccione una Categoria</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
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
            $.each($("#tablaSubCategorias tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                   $(this).hide();
                else
                   $(this).show();                
            });
        }); 
    </script>
@endsection