$(document).ready(function () {
    $('#editarmetadato').on('submit', function (e) {
        e.preventDefault();
        var id= $('#id').val();
        var keyword=$('#keyword').val();
        var descripcion=$('#descripcion').val();
        var seccion=$('#seccion').val();
        var form= new FormData();
        form.append('keyword',keyword);
        form.append('descripcion',descripcion);
        form.append('seccion',seccion);
        form.append('_method','PUT');

        $.ajax({
            type: "POST",
            url: "actualizarmetadato/"+id,
            data: form,
            processData:false,
            contentType:false,
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Se editó el metadato","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Hubo un problema","","error");
                setTimeout(function(){location.reload()},1500);
            }
        });
    });
});
function editarmetadato(id){
    $.ajax({
        type: "get",
        url: "editarmetadato/"+id,
        success: function (response) {
            $('#id').val(id);
            $('#keyword').val(response.keyword);
            $('#descripcion').val(response.descripcion);
            $('#seccion').val(response.seccion);
        }
    });
}
