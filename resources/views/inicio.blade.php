@extends('layouts.plantilla')
@section('contenido')
<style>
    .carousel-indicators > li {
        border-radius: 50%;
        width: 12px;
        height: 12px;
        background-color: #FDFDFD !important;
    }
    .carousel-indicators > li.active {
        background-color: #1EBCC1 !important;
        width: 12px;
        height: 12px;
    }
</style>
     <!--Slider-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <?php $cantidad=count($sliders)?>
        <ol class="carousel-indicators">
            
        @for ($i = 0; $i < $cantidad; $i++)
            @if ($i==0)
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            @else
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}"></li>
            @endif
        @endfor
        </ol>
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                @if($loop->first)
                <div class="carousel-item active">
                    <div class="row" style=" 
                        background-image:url('{{url(asset(Storage::url($slider->imagen)))}}');
                        background-size:cover;
                        background-repeat:no-repeat;
                        height:365px;
                        ">
                        <div class="col-md-6 ">
                            <div class="" style="margin-left: 40px;margin-top:20%">{!!$slider->texto!!}</div>
                        </div>
                    </div>
                   
            </div>
           
                @else 
                <div class="carousel-item">
                    <div class="row" style=" 
                    background-image:url('{{url(asset(Storage::url($slider->imagen)))}}');
                    background-size:cover;
                    background-repeat:no-repeat;
                    height:346px;
                    ">
                        <div class="col-md-5 " style="margin-left: 150px;padding-top: 50px">
                            <div class="imgPrincipal_titulo">{!!$slider->texto!!}</div>
                        </div>
                    </div>
            </div>
                @endif
            @endforeach 
           
        </div>
    </div>
    <!--Selector de Soluciones-->
    <div class="container-fluid mb-5 py-5 ps-md-5" style="background-color: #AEDADB33">
        <div class="row">
            <div class="col-md-12 text-center" style="font-family: 'Roboto-Light';font-size:32px;color:#053E85">
                Encuentre la solución para todo tipo de proyecto
                <div class="lineaCeleste mx-auto"></div>
            </div>
            <div class="col-md-4">
                <select class="form-select rounded-pill SelectorCat" id="SelectorCat" aria-label="Default select example">
                    <option selected disabled>Usted quiere</option>
                    @if($categorias->isEmpty())
                    <option value="" selected>No hay Categorias Cargadas, cargue para continuar</option>
                    @else 
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria}}">{{$categoria->nombre}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select rounded-pill SelectorCat" id="selectSubCats" aria-label="Default select example">

                </select>
            </div>
        </div>
       
    </div>
    {{-- <!--Productos-->
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12 text-center Empresa_titulo my-5">
                CONOCÉ NUESTROS PRODUCTOS
            </div>
            @foreach ($productos as $prod)
                <div class="col-md-4 border contenedor">
                    <a class="link_prod" href="{{route('producto',$prod->id)}}">
                        <div class="image" style="
                                background-image:url({{asset(Storage::url($prod->img_uno))}});
                                background-size:contain;
                                background-repeat:no-repeat;
                                background-position:center;
                                height:306px;
                                width:100%
                                position:relative;
                            ">
                        </div>
                        <div class="producto_linea"></div>
                        <div class="producto-titulo">
                            {{$prod->titulo}}
                        </div>
                        <div class="overlay">
                        
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!--Texto-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center my-3">
                <div class="Inicio-titulo">
                    sólida trayectoria EN BOMBAS Y MOTORES OLEOHIDRÁULICOS
                </div>
            </div>
        </div>
    </div>
    <!--Servicios-->
    <div class="container-fluid">
        <div class="row">
            @php
                $i=1;
            @endphp
            @foreach ($servicios as $servicio)
               
                @if ($i<=3 )
                    <div class="col-md-4 py-4 border" style="background-color:#F9F9F9">
                        <div class="d-flex  align-items-center">
                            <div class="col-md-2 col-1 text-center">
                                <i class="fas fa-check fa-lg"></i>
                            </div>
                           
                            <div class="col-md-10 col-11 ServicioTitulo "> 
                                {{$servicio->titulo}} 
                            </div>
                        </div>
                    </div>
                @endif
                @if ($i>=4 && $i<=6)
                <div class="col-md-4 py-4 border">
                    <div class="d-flex justify-content-around align-items-center">
                        <div class="col-md-2 col-1 text-center" >
                            <i class="fas fa-check fa-lg"></i>
                        </div>
                       
                        <div class="col-md-10 col-11 ServicioTitulo"> 
                            {{$servicio->titulo}} 
                        </div>
                    </div>
                </div>
                @endif
                @if ($i>=6 )
                    @php
                        $i=1;
                    @endphp
                @else 
                    @php
                        $i++;
                    @endphp
                @endif
              
            @endforeach
        </div>
    </div>
     <!--Sectores-->
     <div class="container-fluid ps-md-5">
        <div class="row my-5">
           @for ($i = 0; $i < count($sectores); $i++) 
            <div class="col-md-4">
                <div class="d-flex align-items-center justify-content-start">
                    <img src="{{asset(Storage::url($sectores[$i]->icono))}}" class="img-fluid">
                    <div class="Servicio-TituloSector">{{$sectores[$i]->titulo}}</div>
                </div>
            </div>     
           @endfor
        </div>
    </div>
    <!--Seccion Nosotros-->
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center py-5" style="
        background-image:linear-gradient(rgba(29, 29, 29, 0.55),rgba(29, 29, 29, 0.65)),
        url({{url('/')}}/images/inicio/{{$seccionEmpresa->imagen}});
        height:262px
        background-repeat:no-repeat;
        background-position:center;
        ">
      
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="d-flex align-items-center  justify-content-center">
                            <div class="col-3 text-right">
                                <div style="font-family:'Montserrat-Regular';font-size:24px;color:white;"> {{$seccionEmpresa->titulo}}</div>
                                <div class="mt-3"> 
                                    <button class="btn px-4 mr-2" style="background: white;">
                                    <a class="enlace_catalogo" style="font-size:16px;font-family:'Montserrat-Light';color:#575757;text-transform:uppercase;text-decoration:none" href="{{route('empresa')}}">Conocenos <i class="fas fa-arrow-right"></i></a> 
                                    </button>
                                </div>
                            </div>
                            <div class="col- mx-3">
                                <div style="width: 3px;height:123px;background-color:white"></div>
                            </div>
                            <div class="col-7">
                            
                                <div class="" style="font-family:'Montserrat-Regular';font-size:14px;color:white;">
                                    {!!$seccionEmpresa->texto!!}
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="{{asset('js/filtrado.js')}}"></script>
@endsection