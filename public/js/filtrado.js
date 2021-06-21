$('#SelectorCat').on('change',(e)=>{
    var categoria = $('#SelectorCat').val();
    $.ajax({
        type: "GET",
        url: "filtrarPorCategoria/"+categoria,
        success: function(data) { 
            if(data==true){
                $('#ColSubCats').addClass('d-none');
                swal("No hay nada","","warning");
                //Si no hay nada, setear al form para que busque por categoria
            }else{
                //Se setea al buscador para que busque por subcategoria
                //swal("Hay algo","","success");
                $('#ColSubCats').toggleClass('d-none');
                $('#selectSubCats').empty();
                $('#selectSubCats').append($('<option selected disabled>',{value: '', text: ''}));
                var items = data;
                $.each(items, function (i, item) {

                    $('#selectSubCats').append($('<option>', { 
    
                        value: item.id,
    
                        text : item.nombre 
    
                    }));
                    
                });
              
    
            }
            // $("#selectModelo").empty();



            // 
        },

        error: function(xhr, status, error) {
            console.log(xhr);


        },

        complete: function () { 



        },

    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
$('#selectSubCats').on('change',(e)=>{
    var subcategoria = $('#selectSubCats').val();
    $.ajax({
        type: "GET",
        url: "filtrarPorSubCategoria/"+subcategoria,
        success: function(data) { 
            if(data==true){
                //buscar por subcategoria en el formulario
                swal("No hay nada","","warning");
            }else{
                //buscar por sub-subcategoria en el formulario
                //swal("Hay algo","","success");
                $('#ColSub_subCats').toggleClass('d-none');
                $('#selectSub_SubCats').empty();
                $('#selectSub_SubCats').append($('<option selected disabled>',{value: '', text: ''}));
                var items = data;
                $.each(items, function (i, item) {

                    $('#selectSub_SubCats').append($('<option>', { 
    
                        value: item.id,
    
                        text : item.nombre 
    
                    }));
                    
                });
              
    
            }
            // $("#selectModelo").empty();



            // 
        },

        error: function(xhr, status, error) {
            console.log(xhr);


        },

        complete: function () { 



        },

    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});