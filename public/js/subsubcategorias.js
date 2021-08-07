const url=location.href;
$(function(){
    $('#formAgregarSubSubCategoria').on('submit',function(e){
        e.preventDefault();
        const form= new FormData($('#formAgregarSubSubCategoria')[0]);
        let descripcion=$('#summerDescripcionSubSubCat').summernote('code');
        let descripcion_en=$('#summerDescripcionSubSubCat_en').summernote('code');
        form.append('descripcion',descripcion);
        form.append('descripcion_en',descripcion_en);
        $.ajax({
            type: "POST",
            url: url+"/agregarSubSubCategoria",
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Sub-SubCategoria Agregada","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
          });
    });
    $('#formEditarSubSubCategoria').on('submit',function(e){
        e.preventDefault();
        let id=$('#id_SubSubCat').val();
        const form= new FormData($('#formEditarSubSubCategoria')[0]);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: url+"/actualizarSubSubCategoria/"+id,
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Sub-SubCategoria Actualizada","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
          });
    });
});
function editarSubSubCategoria(id){
    $.ajax({
        type: "get",
        url: url+"/editarSubSubCategoria/"+id,
        success: function (response) {
        $('#id_SubSubCat').val(id);
        $('#orden_SubSubcat').val(response.orden);
        $('#nombre_Subsubcat').val(response.nombre);
        $('#nombre_Subsubcat_en').val(response.nombre_en);
        $('#nombre_Subsubcat_it').val(response.nombre_it);
        $('#select_subcategoria_edit').val(response.subcategory_id);
        }
    });
}
function eliminarSubSubCategoria(id){
    swal({
        title: "Esta seguro/a de eliminar una SubSubCategoria?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: url+"/eliminarSubSubCategoria/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if(response==false){
                        swal("No se puede eliminar una SubSubCategoria","Con Soluciones asociadas.\nElimine las Soluciones primero","warning");
                    }
                    if(response==true){
                        swal("Poof! SubSubCategoria Eliminada!","","success");
                      setTimeout(function(){location.reload()},1000);
                    }
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



