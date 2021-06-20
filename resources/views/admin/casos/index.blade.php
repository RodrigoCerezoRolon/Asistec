@extends('home')
@section('contenido')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Casos
                        <a class="btn btn-outline-info float-right" href="{{route('casos.create')}}">
                            <i class="fas fa-plus"></i>
                            Agregar Caso
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Titulo</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($casos as $caso)
                                    <tr>
                                        <td>{{$caso->titulo}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a   class="btn btn-link btn-primary btn-lg" href="{{route('casos.edit',$caso->id)}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
            
                                                <button    class="btn btn-link btn-danger"  onclick="eliminarCaso({{$caso->id}})" >
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
        function eliminarCaso(id){
            swal({
            title: "Esta seguro/a de eliminar un Caso?",
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
                            swal("Poof! Caso Eliminado!","","success");
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