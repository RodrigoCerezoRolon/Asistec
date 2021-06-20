 @extends('home')
@section('contenido')
<style>
    /**********File Inputs**********/
.container-input {
    text-align: center;
    margin: 0 auto;
    margin-top: 20px;
}

.inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.inputfile + label {
    max-width: 80%;
    font-size: 1.25rem;
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
}

.inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    margin-right: 0.25em;
}

.iborrainputfile {
	font-size:16px; 
	font-weight:normal;
    font-family: 'Lato';
    color:white;
}

/* style 1 */

.inputfile-1 + label {
    color: white;
    background-color: #17a2b8;
}

.inputfile-1:focus + label,
.inputfile-1.has-focus + label,
.inputfile-1 + label:hover {
    background-color: #17a2b8;
}
</style>
    <script src="{{asset('js/categorias.js')}}"></script>
    <div class="container my-5">
        <div class="row">
             <!--Categorias-->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                        Editar Categorias
                        </div>
                        <div class="float-left">
                            <input type="text" class="form-control" id="search" placeholder="Nombre a Buscar">
                        </div> 
                        <div class="float-right">
                            <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalAgregarCategoria">
                                <i class="fas fa-plus"></i>
                                Agregar Categoria
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table" id="tablaCategorias">
                            <th>Orden</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{$categoria->orden}}</td>
                                        <td>{{$categoria->nombre}}</td>
                                       
                                        <td>
                                            <div class="form-button-action">
                                                <button   class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#modalEditarCategoria" onclick="editarCategoria({{$categoria->id}})">
                                                    <i class="fa fa-edit"></i>
                                                    </button>
            
                                                    <button    class="btn btn-link btn-danger"  onclick="eliminarCategoria({{$categoria->id}})" >
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
<!--Agregar Categoria-->
<div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formAgregarCategoria" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">
                <label for="orden">Orden</label>
                <input type="text" class="form-control"  name="orden" required>
                <label for="tituloedit">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Agregar</button>
            </div>
        </form>
      </div>
    </div>
</div>
<!--Editar Categoria-->
<div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="modaleditar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Editar Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="formActualizarCategoria" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="modal-body">

               
                <input type="hidden" id="id_Cat">
                <label for="orden">Orden</label>
                <input type="text" class="form-control"  name="orden" id="orden_cat">
                <label for="tituloedit">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre_cat">
                
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
            $.each($("#tablaCategorias tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                   $(this).hide();
                else
                   $(this).show();                
            });
        }); 
    </script>
@endsection


