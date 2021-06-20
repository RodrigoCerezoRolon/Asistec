$(document).ready(function () {
    $('#editarUsuario').on('submit', function (e) {
        e.preventDefault(e);
        var id=$('#id-user').val();
        var form= new FormData();
        var user=$('#username').val();
        var pass=$('#password').val();
        var role=$('#role').val();
        form.append('username',user);
        form.append('password',pass);
        form.append('role_id',role);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: "actualizarusuario/"+id,
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Usuario editado correctamente","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function (response){
                console.log(response);
            }
        });
    });
});
function editarUsuario(id){
    $.ajax({
        type: "get",
        url: "editarusuario/"+id,
        success: function (response) {
            $('#id-user').val(id);
            $('#username').val(response.username);
            if(response.role_id==1){
                $('#role').val('1');
            }else{
                $('#role').val('2');
            }
        }
    });
}
function eliminarUsuario(id){
    swal({
        title: "Estas seguro/a?",
        text: "Estas ha punto de eliminar un usuario",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons:['Cancelar','Eliminar']
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "delete",
                url: "eliminarusuario/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Tu usuario ha sido eliminado!", {
                        icon: "success",
                      });
                      setTimeout(function(){ location.reload(); }, 1500);
                },
                error: function (response) {
                    swal("No se ha podido borrar el usuario","","error");
                }
            });

        } else {
          swal("No se ha eliminado nada!");
        }
      });
}
