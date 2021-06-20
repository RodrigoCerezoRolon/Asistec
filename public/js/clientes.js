$(function(){
    $('#agregarCliente').on('submit',function(e){
        e.preventDefault();
        var form= new FormData($('#agregarCliente')[0]);
      
        $.ajax({
            type: "POST",
            url: "agregarCliente",
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Cliente agregado!","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
    });
    $('#actualizarCliente').on('submit',function(e){
        e.preventDefault();
        var id=$('#id').val();
       
        var form= new FormData($('#actualizarCliente')[0]);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: "actualizarCliente/"+id,
            data: form,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
               swal("Cliente editado correctamente","","success");
               setTimeout(function(){ location.reload(); }, 1500);
            },
            error: function(response) {
                console.log(response);
                swal("Hubo un problema","","error");
            }
        });
    });
});
function editarCliente(id){
    $.ajax({
        type: "get",
        url: "editarCliente/"+id,
        success: function (response) {
            //console.log(response);
            $('#id').val(id);
            var path= "../../storage/";
            $('#preview').attr('src',path+response.imagen);
            $('#ordenedit').val(response.orden);
        },
        error: function(response){
            console.log(response);
        }
    });

}
function eliminarCliente(id){
    swal({
        title: "Esta seguro/a de eliminar un Cliente?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: "eliminarCliente/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Cliente Eliminado!","","success");
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