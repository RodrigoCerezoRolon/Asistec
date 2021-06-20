@extends('home')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Productos
                        <a href="{{route('productos.create')}}" class="btn btn-outline-info float-right">
                            <i class="fas fa-plus"></i>
                            Agregar Producto
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                <td>{{$producto->titulo}}</td>
                                <td>
                                    <div class="form-button-action">
                                        <a   class="btn btn-link btn-primary btn-lg" href="{{route('productos.edit',$producto->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
    
                                        <button    class="btn btn-link btn-danger"  onclick="eliminarproducto({{$producto->id}})" >
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
    <script>
        function eliminarproducto(id){
    swal({
        title: "Esta seguro/a de eliminar un producto?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: location.href+"/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! producto Eliminado!","","success");
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