$(function(){
    $('#formAgregarServicio').on('submit',(e)=>{
        e.preventDefault();
        const form= new FormData($('#formAgregarServicio')[0]);
        $.ajax({
            type: "POST",
            url: "agregarServicio",
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Servicio Agregado!","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
    });
    $('#formEditarServicio').on('submit',(e)=>{
        e.preventDefault();
        const form= new FormData($('#formEditarServicio')[0]);
        let id=$('#id_servicio').val();
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: "actualizarServicio/"+id,
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Servicio Actualizado!","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
    });
    $('#formAgregarSector').on('submit',function(e){
        e.preventDefault();
        let form= new FormData($('#formAgregarSector')[0]);
        $.ajax({
            type: "post",
            url: "agregarSector",
            data: form,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Sector agregado","","success");
                setTimeout(function(){ location.reload(); }, 1500);
            },
            error: function(response){
                console.log(response);
                swal("Hubo un error","","error");
            }
        });
    });
    $('#formEditarSector').on('submit',function(e){
        e.preventDefault();
        let form= new FormData($('#formEditarSector')[0]);
        let id= $('#id_sector').val();
        form.append('_method','PUT');
        $.ajax({
            type: "post",
            url: "actualizarSector/"+id,
            data: form,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Sector Actualizado","","success");
                setTimeout(function(){ location.reload(); }, 1500);
            },
            error: function(response){
                console.log(response);
                swal("Hubo un error","","error");
            }
        });
    });
});
function editarServicio(id) {
    $.ajax({
        type: "GET",
        url: "editarServicio/"+id,
        processData:false,
        contentType:false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#id_servicio').val(id);
            $('#orden_servicio').val(response.orden);
            $('#titulo_servicio').val(response.titulo);
        },
        error: function(response){
            console.log(response);
            swal("Algo salio mal","","error");
        }
    });
}
function eliminarServicio(id){
    swal({
        title: "Esta seguro/a de eliminar un Servicio?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: "eliminarServicio/"+id,
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
function editarSector(id) {
    $.ajax({
        type: "GET",
        url: "editarSector/"+id,
        processData:false,
        contentType:false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            const path="../../storage/";
            $('#id_sector').val(id);
            $('#orden-sector').val(response.orden);
            $('#titulo-sector').val(response.titulo);
            $('#texto').summernote('code',response.texto);
            $('#previewImg-sector').attr('src',path+response.imagen);
            $('#previewIcono-sector').attr('src',path+response.icono);
        },
        error: function(response){
            console.log(response);
            swal("Algo salio mal","","error");
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
                url: "eliminarSector/"+id,
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