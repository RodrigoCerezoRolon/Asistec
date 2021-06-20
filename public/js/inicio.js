$(function(){
    
    $('#formActualizarSeccionIconos').on('submit',function(e){
        e.preventDefault();
        const form= new FormData($('#formActualizarSeccionIconos')[0]);
        let id=$('#id_seccionIconos').val();
        form.append('_method','PUT');
        $.ajax({
            type:"POST",
            url:"actualizarSeccion/"+id,
            data:form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                swal("Contenido Actualizado","","success");
                setTimeout(() => {
                    location.reload();
                }, 1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salió Mal","","error");
            }
        });
    });
    $('#formSeccionEmpresa').on('submit',function(e){
        e.preventDefault();
        const form= new FormData($('#formSeccionEmpresa')[0]);
        let id=$('#id_seccionEmpresa').val();
        form.append('_method','PUT');
        $.ajax({
            type:"POST",
            url:"actualizarSeccionEmpresa/"+id,
            data:form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                swal("Contenido Actualizado","","success");
                setTimeout(() => {
                    location.reload();
                }, 1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salió Mal","","error");
            }
        });
    });
   
});