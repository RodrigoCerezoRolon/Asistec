const url=location.href;
$(function(){
    $('#formAgregarSubCategoria').on('submit',function(e){
        e.preventDefault();
        const form= new FormData($('#formAgregarSubCategoria')[0]);
        let descripcion=$('#summerDescripcionSubCat').summernote('code');
        let descripcion_en=$('#summerDescripcionSubCat_en').summernote('code');
        form.append('descripcion',descripcion);
        form.append('descripcion_en',descripcion_en);
        $.ajax({
            type: "POST",
            url: url+"/agregarSubCategoria",
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("SubCategoria Agregada","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
          });
    });
    $('#formActualizarSubCategoria').on('submit',function(e){
        e.preventDefault();
        let id=$('#id_SubCat').val();
        const form= new FormData($('#formActualizarSubCategoria')[0]);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: url+"/actualizarSubCategoria/"+id,
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("SubCategoria Actualizada","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
          });
    });
});
function editarSubCategoria(id){
    $.ajax({
        type: "get",
        url: url+"/editarSubCategoria/"+id,
        success: function (response) {
        $('#id_SubCat').val(id);
        $('#orden_subcat').val(response.orden);
        $('#nombre_subcat').val(response.nombre);
        $('#nombre_subcat_en').val(response.nombre_en);
        $('#nombre_subcat_it').val(response.nombre_it);
        $('#select_subcategoria').val(response.category_id);
        }
    });
}
function eliminarSubCategoria(id){
    swal({
        title: "Esta seguro/a de eliminar una SubCategoria?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: url+"/eliminarSubCategoria/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if(response==false){
                        swal("No se puede eliminar una SubCategoria","Con Sub-SubCategorias o Soluciones asociadas.\nElimine los Subelementos primero","warning");
                    }
                    if(response==true){
                        swal("Poof! SubCategoria Eliminada!","","success");
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