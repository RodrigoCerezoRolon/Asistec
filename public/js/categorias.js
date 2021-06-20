const url= location.href;
$(function(){
   
    $('#formAgregarCategoria').on('submit',function(e){
        e.preventDefault();
        const form= new FormData($('#formAgregarCategoria')[0]);
        let descripcion=$('#summerDescripcionCat').summernote('code');
        let descripcion_en=$('#summerDescripcionCat_en').summernote('code');
        form.append('descripcion',descripcion);
        form.append('descripcion_en',descripcion_en);
        $.ajax({
            type: "POST",
            url: url+"/agregarCategoria",
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Categoria Agregada","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
          });
    });
    $('#formActualizarCategoria').on('submit',function(e){
        e.preventDefault();
       
        let id=$('#id_Cat').val();
        const form= new FormData($('#formActualizarCategoria')[0]);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: url+"/actualizarCategoria/"+id,
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Categoria Actualizada","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
          });
    });
});
function editarCategoria(id){
    $.ajax({
        type: "get",
        url:  url+"/editarCategoria/"+id,
        success: function (response) {
        let path="../../images/productos/";
        $('#id_Cat').val(id);
        $('#orden_cat').val(response.orden);
        $('#nombre_cat').val(response.nombre);
        }
    });
}
function eliminarCategoria(id){
    swal({
        title: "Esta seguro/a de eliminar una Categoria?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: url+"/eliminarCategoria/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if(response==false){
                        swal("No se puede eliminar una Categoria con  Subcategorias o Productos asociados","Elimine los Subelementos primero","warning");
                    }
                    if(response==true){
                      swal("Poof! Categoria Eliminada!","","success");
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