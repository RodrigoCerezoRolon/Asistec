<!doctype html>
<html lang="es">
  <head>
      @csrf
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/b3aeabf072.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--Fuentes-->
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <!--Estilos Plantilla-->
    <link rel="stylesheet" href="{{asset('css/plantilla.css')}}">
    <!--Sweet Alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Jquery-->
    <script src="{{asset('js/jquery/jquery.js')}}"></script>
    <title>Asistec</title>
  </head>
  <body>
    <header>
        <div class="d-none d-sm-flex lineasuperior  justify-content-md-between px-md-5">
            <div class="d-flex align-items-center">
              
               @foreach ($contactos as $contacto)
                    {{-- @if ($contacto->dato=="direccion")
                    <a class="link-lineasuperior" href="mailto:{{$contacto->texto}}">
                        <i class="fas fa-map-marker-alt" style="color: white"></i>
                        <span > {{$contacto->texto}}</span>
                    </a>
                    @endif --}}
                  
                    @if ($contacto->dato=="telefono")
                  
                    <a class="link-lineasuperior me-md-3" href="tel:{{$contacto->texto}}">
                        <i class="fa fa-phone-alt" style="color: white"></i>
                        <span > {{$contacto->texto}}</span>
                    </a>
                    @endif
                    @if ($contacto->dato=="whatsapp")
                  
                    <a class="link-lineasuperior ms-2 me-md-0" href="https://wa.me/{{$contacto->texto}}">
                        <i class="fab fa-whatsapp" style="color: white"></i>
                        <span > {{$contacto->texto}}</span>
                    </a>
                   
                    @endif
                    @if ($contacto->dato=="email")
                   
                    <a class="link-lineasuperior me-md-3" href="mailto:{{$contacto->texto}}">
                        <i class="far fa-envelope" style="color: white"></i>
                        <span > {{$contacto->texto}}</span>
                    </a>
                    @endif
                   
                    {{-- @if ($contacto->dato=="instagram")
                    <div class="mx-2" style="height: 40px;background-color:white;width:0.5px;"></div>

                        <a href="{{$contacto->texto}}">
                            <i class="fab fa-instagram" style="color: white"></i>
                        </a>
                        <div class="mx-2" style="height: 40px;background-color:white;width:0.5px;"></div>

                    @endif --}}
                   
                 
               @endforeach
            </div>
            <div class="d-none d-md-flex align-items-center" style="background-color: #A80F1B">
                <a class="link-calculadora {{Route::is('presupuesto') ? 'presupuesto_active' : ''}}" href="{{route('presupuesto')}}">
                   SOLICITUD DE PRESUPUESTO
                </a>
            </div>
           
           
        </div>
        <?php 
        $routeName = Route::currentRouteName();
    
    
    switch ($routeName) {
        case 'inicio':
            $inicio_active = 'active';
            break;
        case 'empresa':
       
            $empresa_active = 'active';
            break;
        case 'soluciones':
        case 'soluciones.show':
        case 'solucionPorCat': 
        case 'solucionPorSub': 
        case 'solucionPorSubSub':
            $soluciones_active='active';
            break;
        case 'fabricacion':
            $fabricacion_active= 'active';
            break;
        case 'mantenimiento':
            $mantenimiento_active='active';
            break;
        case 'sectores':
            $sectores_active = 'active';
            break;
        case 'postVenta':
            $postventa_active = 'active';
            break;
        case 'presupuesto':
            $presupuesto_active = 'active';
            break;
        case 'clientes':
            $clientes_active = 'active';
            break;
        case 'contacto':
            $contacto_active = 'active';
        break;	
      
    }
            ?>
        <div class="container-fluid ps-5" >
            <nav class="navbar navbar-expand-lg navbar-light " style="padding: unset">
                <a class="navbar-brand" href="{{route('inicio')}}"><img class="img-fluid" src="{{asset(Storage::url($iconoSup->icono))}}" width="358px"></a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav ms-auto  " style="white-space: nowrap">
                    <li class="nav-item ">
                        <a class="nav-link {{$empresa_active ?? ''}} " href="{{route('empresa')}}">EMPRESA</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{$soluciones_active ?? ''}}" href="{{route('soluciones')}}">SOLUCIONES</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{$fabricacion_active ?? ''}}" href="{{route('fabricacion')}}">FABRICACIÓN de PRODUCTOS ESPECIALES</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{$mantenimiento_active ?? ''}}" href="{{route('mantenimiento')}}">Mantenimiento</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{$sectores_active ?? ''}}" href="{{route('sectores')}}">Sectores</a>
                    </li> 
                    <li class="nav-item ">
                        <a class="nav-link {{$casos_active ?? ''}}" href="{{route('casos')}}">Casos de éxito</a>
                    </li> 
                    <li class="nav-item ">
                        <a class="nav-link {{$clientes_active ?? ''}}" href="{{route('clientes')}}">Clientes</a>
                    </li> 
                    <li class="nav-item ">
                        <a class="nav-link {{$contacto_active ?? ''}}" href="{{route('contacto')}}">Contacto</a>
                    </li> 
                    {{-- <a class="nav-item nav-link" href="{{route('contacto')}}"><i class="fas fa-search"></i> </a> --}}
                  </ul>
                 
                </div>
            </nav>
        </div>
    </header>
    @yield('contenido')
    <div class="d-flex align-items-center justify-content-center" style="background-color:#1EBCC1;height:55px">
        @foreach ($contactos as $contacto)
        @if($contacto->dato=="linkedin")
                    
          <a class="redes_pie me-3" href="{{$contacto->texto}}"><i class="fab fa-linkedin-in" style="color: white"></i></a>
        @endif
        @endforeach
        @foreach ($contactos as $contacto)
        @if($contacto->dato=="youtube")
        <a class="redes_pie" href="{{$contacto->texto}}"><i class="fab fa-youtube " style="color: white"></i></a>
        @endif
        @endforeach
        @foreach ($contactos as $contacto)
        @if($contacto->dato=="facebook")
          <a class="red_pie_facebook ms-3" href="{{$contacto->texto}}"><i class="fab fa-facebook-f" style="color: white"></i></a>
        @endif
        @endforeach
    </div>
    <footer>
        <div class="container-fluid py-5 ps-5 " style="background-color: #053E85">
             
             <div class="row">
                
                 <div class="col-md-4">
                     <div class="pie_titulo">Secciones</div>
                     <div class="row">
                         <div class="col-md-6">
                             <div class=""><a class="pie_secciones" href="{{route('empresa')}}">Empresa</a></div>
                             <div class=""><a class="pie_secciones" href="{{route('soluciones')}}">Soluciones</a></div>
                             <div class=""><a class="pie_secciones" href="{{route('fabricacion')}}">FABRICACIÓN de PRODUCTOS ESPECIALES</a></div>
                             <div class=""><a class="pie_secciones" href="{{route('mantenimiento')}}">MANTENIMIENTO</a></div>

                         </div>
                         <div class="col-md-6">
                             <div class=""><a class="pie_secciones" href="{{route('sectores')}}">Sectores</a></div>
                             <div class=""><a class="pie_secciones" href="{{route('casos')}}">Casos de exito</a></div>
                             <div class=""><a class="pie_secciones" href="{{route('clientes')}}">Clientes</a></div>
                             <div class=""><a class="pie_secciones" href="{{route('contacto')}}">Contacto</a></div>

 
                         </div>
                     </div>
                 
                   
                 </div>
                 <div class="col-md-3">
                     <div class="pie_titulo">Suscribite a nuestro newsLetter</div>
                     <form id="formSubscribirse">
                         <div class="input-group flex-nowrap mt-2">
                         
                             @csrf
                             <input id="correo_news" type="text" name="email" class="form-control" style="border-top-left-radius: 14px;border-bottom-left-radius: 14px" placeholder="Ingresa tu email" aria-label="Username" aria-describedby="addon-wrapping">
                             <span class="input-group-text btn_suscribirse" id="addon-wrapping" style="background-color: #1EBCC1;border-top-right-radius:20px;border-bottom-right-radius: 20px;border:#30A0DB"><i class="fas fa-paper-plane" style="color: #F9F9F9"></i></span>
                         
                         </div>
                     </form>
                 </div>
                 <div class="col-md-4 ms-md-5">
                     <div class="pie_titulo">Contactanos</div>
                     <div class="row">
                         @foreach ($contactos as $contacto)
                         @if ($contacto->dato=="direccion")
                            <div class="col-md-1 col-1 mt-2">
                                <i class="fas fa-map-marker-alt IconoContacto" ></i>
                            </div>
                            <div class="col-md-11 col-11 mt-2">
                                <a class="pie-enlacecontacto" href="https://goo.gl/maps/ArHHNC2i8NWoubZy9">{{$contacto->texto}}</a>
                            </div>
                        @endif 
                         @if ($contacto->dato=="correo")
                             <div class="col-md-1 col-1 mt-2">
                                 <i class="fas fa-envelope IconoContacto "></i>
                             </div>
                             <div class="col-md-11 col-11 mt-2">
                                 <a class="pie-enlacecontacto" href="mailto:{{$contacto->texto}}">{{$contacto->texto}}</a>
                             </div>
                         @endif
                         @if ($contacto->dato=="telefono")
                             <div class="col-md-1 col-1 mt-2">
                                 <i class="fas fa-phone-alt IconoContacto"></i>
                             </div>
                             <div class="col-md-11 col-11 mt-2">
                                 <a class="pie-enlacecontacto" href="tel:{{$contacto->texto}}">{{$contacto->texto}}</a>
                             </div>
                         @endif
                         @if ($contacto->dato=="whatsapp")
                         <div class="col-md-1 col-1 mt-2">
                             <i class="fab fa-whatsapp" style="color: white"></i>
                         </div>
                         <div class="col-md-11 col-11 mt-2">
                             <a class="pie-enlacecontacto" href="https://wa.me/:{{$contacto->texto}}">{{$contacto->texto}}</a>
                         </div>
                         
                         @endif
                      
                     @endforeach
                     </div>
                 </div>
             </div>
           
         </div>
     </footer>
     <script>
         $('#addon-wrapping').on('click',()=>{
             $('#formSubscribirse').submit();
         });
         $('#formSubscribirse').on('submit',function(e){
          e.preventDefault();
          let mensaje= $('#msgSuscriptor').val();
          let form= new FormData($('#formSubscribirse')[0]);
          var loc = window.location;
        var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
        let miurl= loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
          $.ajax({
            type: "post",
            url: '../subscribirse',
            data: form,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                swal(`${mensaje}`,"","success");
                $('#correo_news').val("");
                setTimeout(function(){ location.reload(); }, 1500);
            },
            error: function(response){
                console.log(response);
                swal("Algo salió mal","","error");
            }
          });
         });
       </script>
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> --}}

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!---->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    
  </body>
</html>