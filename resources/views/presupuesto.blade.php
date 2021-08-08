@extends('layouts.plantilla')
@section('contenido')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<div class="container my-5">
    <div class="row justify-content-center">
   
        <div class="col-md-2 col-4">
            <img id="icono_edit"class="d-block mx-auto"src="{{asset('images/edit.svg')}}">
            <div class="text-center mt-3" style="font-family: 'Roboto-Regular';color:#707070;font-size:17px">
                @lang('app.DatosPersonales')
                
            </div>
            <div class="text-center">
                <img class="cositoDatos" src="{{url('/')}}/images/cositorojo.png" style="padding-top: 10px;">

            </div>
        </div>
        <div class="col-md-3 col-4 d-flex align-items-center" style="padding-left:0;padding-right:0px;">
            
                <div class="" style="width: 100%;height:1px; background-color:#CBD0D3;"></div>

            
        </div>
        <div class="col-md-2 col-4">
            <img id="icono_chat"class="d-block mx-auto "  src="{{asset('images/chat.svg')}}">
            <div class="text-center mt-3" style="font-family: 'Roboto-Regular';color:#707070;font-size:17px">
                @lang('app.Consulta')
            </div>
            <div class="text-center">
                <img class="cositoConsulta" src="{{url('/')}}/images/cositogris.png" style="padding-top: 20px;">

            </div>
        </div>
        <div id="primero" class="mt-5 col-md-8">
            <form novalidate="" id="form"  enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <input type="text" name="nombre" id="nombre" placeholder="@lang('app.Nombre') (*)" class="form-control" required>
                </div>
                <div class="col-12 col-md-6">
                    <input type="email" name="email" id="email" placeholder="@lang('app.Correo') (*)" class="form-control" required="">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <input type="text" id="telefono" name="telefono" placeholder="@lang('app.Telefono')(*)" class="form-control">
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" id="empresa" name="empresa" placeholder="@lang('app.Empresa')" class="form-control">
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-end">
                 
                    <button onclick="PrimerValidacion()" type="button" class="btn rounded-pill  px-5" style="background-color: transparent;color:white;font-size:14px;font-family:'Roboto-Bold';text-transform:uppercase;border:1px solid #1EBCC1;color:#1EBCC1">@lang('app.Siguiente')</button>
                </div>
            </div>
        </div>
        <div id="segundo" class="mt-5 d-none col-md-8" >
            <div class="row">
                <div class="col-md-12 col-12">
                    <textarea name="mensaje" name="mensaje"placeholder="@lang('app.Mensaje')" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-md-6 col-12 mt-2">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                      </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-between">
                    <button onclick="anterior()" type="button" class="btn px-5 btn-outline-light text-uppercase rounded-pill" style="color: #1EBCC1;border:1px solid #1EBCC1;font-family:'Roboto-Bold';font-size:13px">@lang('app.Volver')</button>
                    <button type="submit" class="btn rounded-pill px-md-5" style="background-color: #1EBCC1;color:white;font-size:13px;font-family:'Roboto-Bold';text-transform:uppercase;border:1px solid #1EBCC1">
                        <span class="spinner-border spinner-border-sm d-none"> </span> <span class="btn-text"> @lang('app.Enviar') </span>
                       
                   </button>
                   
                </div>
            </div>
        </div>
    </form>
    </div>
    
</div>
<script>
    $(document).ready(function(){
        $("#form").validate({ //inicamos la validación del formulario
           //Cada cosa que configures la debes de terminar con una coma ,
           onfocusout: false,  //Si un objeto no cumple con la validación, tomara el foco
           rules: { //iniciamos sección de reglas
               nombre: { //estas seras las reglas para el objeto que en su propiedad name tenga nameO
                   required: true //indicamos que es requerido que contenga un valor
               },
               email: {
                   required: true,
                   email: true //indicamos que debe de cumplir con la estructura de un email
               },
               telefono:{
                   required:true,
                   digits:true,
               }
          },
           messages: {//estos seran los mensaje que aparezcan segun el objeto y la reque que espeficiquemos en la sección de reglas
               nombre: {
                   required: "Este campo es necesario"
               },
               email: {
                   required: "Este campo es necesario",
                   email: "No cumple con la estructura de un correo."
               },
               telefono:{
                   required: "Por favor indique su telefono",
                   digits: "Ingrese solo numeros"
               }
          },
          submitHandler: function(){ //si todos los controles cumplen con las validaciones, se ejecuta este codigo
             //para ocultar el mensaje, le agregamos la clase de Bootstrap 3
             
             $('.spinner-border').removeClass('d-none');
            $('.btn-text').text('Enviando');
            let form= new FormData($('#form')[0])
               $.ajax({
                   type: 'POST',
                   url: '../presupuesto',
                   //data: {nombre:nombre,email:correo,mensaje:mensaje,telefono:tel,empresa:empresa_form,file:archivo},
                   data:form,
                   processData:false,
                    contentType:false,
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }, //parametros (valores) en formato llaver:valor, que se enviaran con la solicitudd
                 success: function(response) {
                   //se llama cuando tiene éxito la respuesta

                   swal("Muchas Gracias!", "Hemos recibido tu consulta!", "success");
                   $('#form')[0].reset();
                 },
                 error: function(response) {
                   console.log(response);
                   swal ( "Oops" ,  "Algo salio mal!" ,  "error" )

                 },complete:function(){
                   $('.spinner-border').addClass('d-none');
                   $('.btn-text').text('Enviar');
                   }
               });
          },
          invalidHandler: function(event, validator) { //si por lo menos uno control no cumplen con las validaciones, se ejecuta este codigo
               var errors = validator.numberOfInvalids(); // número de errores encontrados al validar el formulario
               if (errors) { //si errors = 0 no se ejecuta el if, de ser mayor que cero se ejecuta
                   //la linea de abajo es un if ternario
                   var message = errors == 1 ? ' Error: Te perdiste 1 campo. Ha sido destacado' : ' Error: Te perdiste '+ errors +' campos. Se han destacado';
                   $("div#formError span#Mensaje").html(message); //agregamos el valor de message a objeto seleccionado
                   $("div#formError").removeClass("hidden"); //para que se muestre el mensaje, le quitamos la clase que lo oculta
               }
           },
           highlight: function(element, errorClass) {//los objetos que no cumplan con la validación parpadearan
               $(element).fadeOut(function() {
                   $(element).fadeIn();
               });
           },
           errorElement: "div", //indicamos en qué tipo de objeto DOM se agregarán las alertas. El valor por default es "label"
           errorClass: "alert alert-danger", //indicamos la clase que se agregara a las alertas. El valor por default es "error"
       });
    });
    function PrimerValidacion(){
        if($("#form").valid()){ // test for validity 
            siguiente();
        } else { 
          
         } 
    }
   
      
    
    function siguiente(){
        $('#primero').addClass('d-none');
        $('#segundo').removeClass('d-none');
        $('.cositoConsulta').attr('src','../../images/cositorojo.png');
        $('.cositoDatos').attr('src','../../images/cositogris.png');
        $('#icono_chat').attr('src','../../images/chat2.svg');
        $('#icono_edit').attr('src','../../images/edit2.svg');
    }
    function anterior(){
        $('#primero').removeClass('d-none');
        $('#segundo').addClass('d-none');
        $('#icono_chat').attr('src','../../images/chat.svg');
        $('#icono_edit').attr('src','../../images/edit.svg');
        $('.cositoConsulta').attr('src','../../images/cositogris.png');
        $('.cositoDatos').attr('src','../../images/cositorojo.png');
    }    
</script>
@endsection