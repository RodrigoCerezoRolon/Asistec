@extends('home')
@section('contenido')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Servicios
                    <div class="float-right">
                        <a class="btn btn-outline-info" href="{{route('mantenimiento.create')}}">
                            <i class="fas fa-plus">
                            </i>
                            Agregar Servicio
                        </a>
                    </div>
                </div>  
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Orden</th>
                            <th>Imagen</th>
                            <th>Titulo</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($mantenimientos as $servicio)
                            <tr>
                            <td>{{$servicio->orden}}</td>
                            <td><img class="img-fluid" src="{{asset(Storage::url($servicio->imagen))}}" width="60px"></td>
                            <td>{{$servicio->titulo}}</td>
                            <td>
                                <div class="form-button-action">
                                    <a   class="btn btn-link btn-primary btn-lg" href="{{route('mantenimiento.edit',$servicio->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                        <button    class="btn btn-link btn-danger"  onclick="eliminarServicio({{$servicio->id}})" >
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
        function eliminarServicio(id){
    swal({
        title: "Esta seguro/a de eliminar un Servicio?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            const url= location.href;
            $.ajax({
                type: "DELETE",
                url: url+"/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Servicio Eliminado!","","success");
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