@extends('layouts.plantilla')
@section('contenido')
<style>
    .Servicios_LineaGris{
        background-color: #F2F2F26E;
        font-family: 'Roboto-Light';
        font-size: 14px;
        color: #707070;
        height: 40px;
    }
</style>
<div class="d-flex Servicios_LineaGris align-items-center ps-5">
    <i class="fas fa-home"></i> |
    Contacto
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d26282.899535436318!2d-58.57349776044921!3d-34.56969459999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb9df9f388e3f%3A0x3d98509da51521ae!2sASIS-TEC%20Hidraulica%20-%20Neumatica!5e0!3m2!1ses-419!2sar!4v1624234473704!5m2!1ses-419!2sar" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
<style>
 .link:hover{
  color:#505050;
  text-decoration: underline;
 }    
 .link{
     font-family: 'Roboto-Regular';
     color: #333333CC;
     font-size:16px;
     text-decoration: none;
 }

 .titulo_contacto{
     font-family: 'Montserrat-Bold';
     font-size:13px;
     color:#07B3FC;
 }
 .link-terminos{
     color: #666666;
     text-decoration: none;
 }
 .Contacto-Icono{
    color: #2DBCC0
 }
</style>
<div class="container my-5">

    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="Servicios-TituloSeccion">
                Contacto
            </div>
            <div class="lineaCeleste mx-auto"></div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                   
                       
                        <div class="row">
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fas fa-map-marker-alt fa-lg Contacto-Icono" ></i>
                               
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-11 col-sm-11 col-10 my-2">
                                @foreach ($contactos as $contacto)
                                
                                    @if($contacto->dato=="direccion")
                                    <a class="link"  href="https://goo.gl/maps/tJuqxEhvYvfx6spX8">   <span >{{$contacto->texto}}</span></a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fas fa-envelope fa-lg Contacto-Icono"></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-11 col-sm-10 col-10 my-2">
                                @foreach($contactos as $contacto)
                                @if($contacto->dato=="correo")
                                <a class="link" href="mailto:{{$contacto->texto}}">  {{$contacto->texto}} </a>
                                @endif
                                @endforeach
                            </div>
                            
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fas fa-phone-alt fa-lg Contacto-Icono" ></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-11 col-sm-11 col-10  my-2">
                                @foreach ($contactos as $contacto)
                                @if($contacto->dato=="telefono")
                               
                            <a class="link" href="tel:{{$contacto->texto}}">{{$contacto->texto}}</a>
                                @endif
                                @endforeach
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="fab fa-whatsapp Contacto-Icono" ></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-11 col-sm-10 col-10 my-2">
                                @foreach($contactos as $contacto)
                                @if($contacto->dato=="whatsapp")
                                <a class="link" href="https://wa.me/{{$contacto->texto}}">  {{$contacto->texto}} </a>
                                @endif
                                @endforeach
                            </div>
                        
                                                      
                    
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8">
            @if (session()->has('success'))
                <div class="alert alert-success">
                  Consulta recibida
                </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
            @endif
        <form id="contacto" method="POST" action="{{route('consulta')}}">
               @csrf
                <div class="row">
                  <div class="col">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                  </div>
                  <div class="col">
                   <input type="text" name="empresa" id="empresa" class="form-control" placeholder="Empresa" required>
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
                    <div class="col-6">
                    <textarea class="form-control" name="mensaje" id="mensaje"placeholder="Mensaje" rows="4" cols="50" required></textarea>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                  
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
               
                <div class="row my-3">
                    <div class="col-12">

                        <button type="submit" class="btn  px-md-5 rounded-pill" style="background-color: #1EBCC1;color:white;text-transform:uppercase;font-family: 'Roboto-Bold';font-size:13px">
                            <span class="spinner-border spinner-border-sm d-none"> </span> <span class="btn-text"> Enviar </span>
                           
                       </button>
                    </div>
                </div>
              </form>
        </div>
    </div>

</div>

<script>
   
//    $('#contacto').on('submit',function(e){
//     e.preventDefault();
//     let form= new FormData($('#contacto')[0]);
//         $('.spinner-border').removeClass('d-none');
//         $('.btn-text').text('Enviando');
//         $.ajax({
//             type: 'POST',
//             url: 'email',
//             data: form,
//             processData: false,  // tell jQuery not to process the data
//             contentType: false,   // tell jQuery not to set contentType
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }, //parametros (valores) en formato llaver:valor, que se enviaran con la solicitudd
//             success: function(response) {
//             //se llama cuando tiene éxito la respuesta
//             swal("Muchas Gracias!", "Hemos recibido tu consulta!", "success");
//             $('#contacto')[0].reset();
//             },
//              error: function(response) {
//              console.log(response);
//             swal ( "Oops" ,  "Algo salio mal!" ,  "error" )

//             },complete:function(){
//             $('.spinner-border').addClass('d-none');
//             $('.btn-text').text('Enviar');
//             }
//         });
//    });
</script>


@endsection