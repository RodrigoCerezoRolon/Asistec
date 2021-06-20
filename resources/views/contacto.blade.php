@extends('layouts.plantilla')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> --}}

@section('contenido')
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.7604562418046!2d-58.632162185034424!3d-34.63549326668665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb8bb97a2bd67%3A0x9d49a801c148b1db!2sHydrodina!5e0!3m2!1ses-419!2sar!4v1621892412565!5m2!1ses-419!2sar" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
<style>
 .link:hover{
  color:#858592;
 }   
 .link{
     text-decoration: none;
 } 
 .link_correo:hover{
     color: #858592;
 }
 .titulo_contacto{
     font-family: 'Montserrat-Bold';
     color:#A02316;
     font-size:13px;
 }
</style>
<div class="container my-5">

    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4">
          <div style="color: #A80F1B;font-family:'Montserrat-Bold';font-size:18px">  HYDRODINA</div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                   
                       
                        <div class="row">
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fas fa-map-marker-alt fa-lg" style="color:#A02316;"></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-11 col-10 my-2">
                                @foreach ($contactos as $contacto)
                                    @if($contacto->dato=="direccion")
                                  
                                    <a class="link"  href="https://goo.gl/maps/JMu9gRSo3rxsUFVKA">   <span style="font-size:13px;font-family: 'Montserrat-Regular';color:#858592" >{{$contacto->texto}}</span></a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fas fa-envelope fa-lg" style="color: #A02316"></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10 my-2">
                                @foreach($contactos as $contacto)
                                @if($contacto->dato=="email")
                              
                                <a class="link" href="mailto:{{$contacto->texto}}">     <span style="font-size:13px;font-family: 'Montserrat-Regular';color:#858592">{{$contacto->texto}} </span></a>
                                @endif
                                @endforeach
                            </div>
                            {{-- <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fab fa-whatsapp fa-lg" style="color: #A02316"></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10 my-2">
                                @foreach($contactos as $contacto)
                                @if($contacto->dato=="whatsapp")
                              
                                <a class="link_correo" href="https://wa.me/{{$contacto->texto}}">     <span style="font-size:13px;font-family: 'Montserrat-Regular';color:#6E6F71">{{$contacto->texto}} </span></a>
                                @endif
                                @endforeach
                            </div> --}}
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fas fa-phone-alt fa-lg" style="color:#A02316"></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-11 col-10  my-2">
                                @foreach ($contactos as $contacto)
                                @if($contacto->dato=="telefono")
                           
                            <a class="link" href="tel:{{$contacto->texto}}">    <span style="font-size:13px;font-family: 'Montserrat-Regular';color:#858592">{{$contacto->texto}} </span></a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-xl-12 col-lg-12 col-md-12 ">
                            <p class=""style="font-family:'Montserrat-Regular';color:#858592;font-size:13px">
                                Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.
                            </p>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8">
            <form id="contacto">
               @csrf
                <div class="row">
                  <div class="col">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                  </div>
                  <div class="col">
                   <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" required>
                  </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                      <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo electrónico" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                    <textarea class="form-control" name="mensaje" id="mensaje"placeholder="Mensaje" rows="4" cols="50" required></textarea>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12 ">
                        <button class="btn py-2 px-5  rounded-pill" type="submit" style="background: #A02316; color:white;font-family:'Montserrat-SemiBold';font-size:11px;float:right;">
                        <span class="spinner-border spinner-border-sm d-none"> </span>
                        <span class="btn-text">    ENVIAR</span>
                        </button>
                    </div>
                </div>
              </form>
        </div>
    </div>

</div>

<script>
   
   $('#contacto').on('submit',function(e){
    e.preventDefault();
    let form= new FormData($('#contacto')[0]);
        $('.spinner-border').removeClass('d-none');
        $('.btn-text').text('Enviando');
        $.ajax({
            type: 'POST',
            url: 'email',
            data: form,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, //parametros (valores) en formato llaver:valor, que se enviaran con la solicitudd
            success: function(response) {
            //se llama cuando tiene éxito la respuesta
            swal("Muchas Gracias!", "Hemos recibido tu consulta!", "success");
            $('#contacto')[0].reset();
            },
             error: function(response) {
             console.log(response);
            swal ( "Oops" ,  "Algo salio mal!" ,  "error" )

            },complete:function(){
            $('.spinner-border').addClass('d-none');
            $('.btn-text').text('Enviar');
            }
        });
   });
</script>


@endsection