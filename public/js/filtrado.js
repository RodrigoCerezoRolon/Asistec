$('#SelectorCat').on('change',(e)=>{
    alert($('#SelectorCat').val());
    var categoria = $('#SelectorCat').val();
    $.ajax({
        type: "GET",
        url: "/filtrarPorCategoria/"+categoria,
        data: {categoria: categoria},
        success: function(data) { 
            if(data){

            }else{
                
            }
            $("#selectModelo").empty();



            var items = data;



            $.each(items, function (i, item) {

                $('#selectModelo').append($('<option>', { 

                    value: item.modelo,

                    text : item.modelo 

                }));

            });



        },

        error: function(xhr, status, error) {



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