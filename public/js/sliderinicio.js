
$(document).ready(function () {
    $('textarea').summernote({
        placeholder: 'Ingrese texto del slider',
        tabsize: 2,
        lang: 'es-ES',
        height: 120,
        fontNames: ['Roboto-Bold', 'Roboto-Light', 'Roboto-Medium', 'Roboto-Regular', 'Roboto-SemiBold'],
        fontNamesIgnoreCheck:['Roboto-Bold', 'Roboto-Light', 'Roboto-Medium', 'Roboto-Regular', 'Roboto-SemiBold'],
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['fontNames', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']]
        
        ]
      });
    //   $('#summernote-edit').summernote({
    //     placeholder: 'Ingrese texto del slider',
    //     tabsize: 2,
    //     lang: 'es-ES',
    //     height: 120,
    //     fontNames: ['Roboto-Bold', 'Roboto-Light', 'Roboto-Medium', 'Roboto-Regular', 'Roboto-SemiBold'],
    //     fontNamesIgnoreCheck:['Roboto-Bold', 'Roboto-Light', 'Roboto-Medium', 'Roboto-Regular', 'Roboto-SemiBold'],
    //     toolbar: [
    //       ['style', ['style']],
    //       ['font', ['bold', 'underline', 'clear']],
    //       ['fontNames', ['fontname']],
    //       ['color', ['color']],
    //       ['para', ['ul', 'ol', 'paragraph']]
        
    //     ]
    //   });
   
    $('#agregarslider').on('submit',function(e){
        e.preventDefault();
        // var imagen=$('#imagen');
        // var orden=$('#orden').val();
        // var pagina=$('#pagina').val();
        // let texto=$('#summernote').summernote('code');
         var form= new FormData($('#agregarslider')[0]);
        // form.append('orden',orden);
        // form.append('imagen',imagen[0].files[0]);
        // form.append('pagina',pagina);
        // form.append('texto',texto);
        $.ajax({
            type: "POST",
            url: "agregarslider",
            data: form,
            processData:false,
            contentType:false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal("Slider agregado!","","success");
                setTimeout(function(){location.reload()},1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salio mal","","error");
            }
        });
    });

  
    $('#actualizarslider').on('submit',function(e){
        e.preventDefault();
        var form= new FormData($('#actualizarslider')[0]);
        var id=$('#id').val();
        // var orden=$('#editar-orden').val();
        // var imagen=$('#editar-imagen');
        // var texto= $('#summernote-edit').summernote('code');
         form.append('_method', 'PUT');
        // form.append('orden', orden);
        // form.append('editar-imagen', imagen[0].files[0]);
        // form.append('texto',texto);
        $.ajax({
            type: "POST",
            url: "actualizarslider/"+id,
            data: form,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
               swal("Slider editado correctamente","","success");
               setTimeout(function(){ location.reload(); }, 1500);
            },
            error: function(response) {
                console.log(response);
                swal("Hubo un problema","","error");
            }
        });
    });
});
function editarslider(id) {
    // textoedit.setData('');
    // textoediten.setData('');
        $.ajax({
            type: "get",
            url: "editarslider/"+id,
            success: function (response) {
                console.log(response);
                $('#id').val(id);
                var path= "../../storage/";
               $('#preview-img').attr('src',path+response.imagen);
                $('#editar-orden').val(response.orden);
                $('#summernote-edit').summernote('code', response.texto);
                $('#summernote-editEn').summernote('code', response.texto_en);
                $('#summernote-editIt').summernote('code', response.texto_it);
                // textoedit.setData(response.texto);
                // textoediten.setData(response.textoen);
            },
            error: function(response){
                console.log(response);
            }
        });



}
function eliminarslider(id){
    swal({
        title: "Esta seguro/a de eliminar un slider?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "DELETE",
                url: "eliminarslider/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    swal("Poof! Slider Eliminado!","","success");
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
