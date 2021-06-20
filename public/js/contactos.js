$(document).ready(function () {
    $('#actualizarContacto').on('submit',function(e){
        e.preventDefault();
        var id=$('#id').val();
        var dato=$('#dato').val();
        var texto=$('#texto').val();
        var form = new FormData();
        form.append('dato',dato);
        form.append('texto',texto);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: "actualizarContacto/"+id,
            data: form,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
               swal("Dato Contacto editado correctamente","","success");
               setTimeout(function(){ location.reload(); }, 1500);
            },
            error: function(response) {
                console.log(response);
                swal("Hubo un problema","","error");
            }
        });
    });
    $('#formActualizarIconoSup').on('submit',function(e){
        e.preventDefault();
        let id=$('#idIcono').val();
        let form= new FormData($('#formActualizarIconoSup')[0]);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: "actualizarIconoSup/"+id,
            data: form,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
               swal("Icono editado","","success");
               setTimeout(function(){ location.reload(); }, 1500);
            },
            error: function(response) {
                console.log(response);
                swal("Hubo un problema","","error");
            }
        });
    });
    $('#formActualizarIconoInf').on('submit',function(e){
        e.preventDefault();
        let id=$('#idIconoInf').val();
        let form= new FormData($('#formActualizarIconoInf')[0]);
        form.append('_method','PUT');
        $.ajax({
            type: "POST",
            url: "actualizarIconoInf/"+id,
            data: form,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
               swal("Icono editado","","success");
               setTimeout(function(){ location.reload(); }, 1500);
            },
            error: function(response) {
                console.log(response);
                swal("Hubo un problema","","error");
            }
        });
    });
});
function editarContacto(id){
    $.ajax({
        type: "get",
        url: "editarContacto/"+id,
        success: function (response) {
            $('#id').val(id);
            $('#dato').val(response.dato);
            $('#texto').val(response.texto);

        },
        error: function(response){
            console.log(response);
        }
    });
}
