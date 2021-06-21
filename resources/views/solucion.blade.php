@extends('layouts.plantilla')
@section('contenido')
<!-- jQuery 1.8 or later, 33 KB -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Fotorama from CDNJS, 19 KB -->
<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <style>
        .Servicios_LineaGris{
            background-color: #F2F2F26E;
            font-family: 'Roboto-Light';
            font-size: 14px;
            color: #707070;
            height: 40px;
        }
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        border-bottom: 3px solid #1EBCC1 !important;
        font-family: 'Roboto-Bold';
        font-size: 14px;
        color: #053E85;
        text-transform: uppercase;
    }
    </style>
    <div class="d-flex Servicios_LineaGris align-items-center ps-5">
        <i class="fas fa-home"></i> |
        Soluciones
    </div>
    <!--Selector de Soluciones-->
    <div class="container-fluid py-5 ps-md-5" style="background-color: #AEDADB33">
        <form id="formFiltrado">
        <div class="row">
            <div class="col-md-12 text-center" style="font-family: 'Roboto-Light';font-size:32px;color:#053E85">
                Encuentre la solución para todo tipo de proyecto
                <div class="lineaCeleste mx-auto mb-5"></div>
            </div>
            <div class="col-md-3">
                <select class="form-select rounded-pill SelectorCat" id="SelectorCat" aria-label="Default select example">
                    <option selected disabled>Usted quiere</option>
                    @if($categorias->isEmpty())
                    <option value="" selected>No hay Categorias Cargadas, cargue para continuar</option>
                    @else 
                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-3 d-none " id="ColSubCats">
                <select class="form-select rounded-pill SelectorCat" id="selectSubCats" aria-label="Default select example">

                </select>
            </div>
            <div class="col-md-3 d-none " id="ColSub_subCats">
                <select class="form-select rounded-pill SelectorCat" id="selectSub_SubCats" aria-label="Default select example">

                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn rounded-pill px-5 d-block Inicio_btnSoluciones ">
                    Buscar
                </button>
            </div>
        </div>
        </form>
    </div>
    <!--Solucion-->
    <div class="container-fluid">
        <div class="row" >
            <img src="{{asset(Storage::url($solucion->imagen))}}" class="img-fluid">
           
        </div>
        <div class="row" style="background-color: #AEDADB33">
            <div class="col-md-12 mt-3 text-center" style="font-family: 'Roboto-Light';font-size:32px;color:#053E85;">
                {{$solucion->titulo}}
                <div class="lineaCeleste mx-auto mb-3"></div>
            </div>
            <div class="col-md-12 text-center">
                {!!$solucion->texto!!}
            </div>
        </div>
        <div class="row">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach ($solucion->productos()->get() as $producto)
                            @if ($loop->first)
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#navProd{{$producto->id}}" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{$producto->titulo}}</button>
                            @else 
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#navProd{{$producto->id}}" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">{{$producto->titulo}}</button>

                            @endif
                        @endforeach
                    </div>
                </nav>
              <div class="tab-content" id="nav-tabContent">
                  @foreach ($solucion->productos()->get() as $producto)
                    @if ($loop->first)
                        <div class="tab-pane fade show active" id="navProd{{$producto->id}}" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row pt-5 ps-3">
                                <div class="col-md-6">
                                    {!!$producto->texto!!}
                                </div>
                                <div class="col-md-6">
                                    <div class="fotorama" data-nav="thumbs">
                                        @if ($producto->img_uno)
                                            <img src="{{Storage::url($producto->img_uno)}}">
                                        @endif
                                        @if ($producto->img_dos)
                                            <img src="{{Storage::url($producto->img_dos)}}">
                                        @endif
                                        @if ($producto->img_tres)
                                            <img src="{{Storage::url($producto->img_tres)}}">
                                        @endif
                                        @if ($producto->img_cuatro)
                                            <img src="{{Storage::url($producto->img_cuatro)}}">
                                        @endif
                                       
                                    </div>
                                </div>
                                <!--Video-->
                                <div class="col-md-6">
                                    @if ($producto->enlace)
                                        <iframe width="600" height="329" src="https://www.youtube.com/embed/{{$producto->enlace}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                    @endif
                                </div>
                                <div class="col-md-6" style="color: #696A6A">
                                    @if ($producto->texto_video)
                                        {!!$producto->texto_video!!}
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    @else 
                    <div class="tab-pane fade" id="navProd{{$producto->id}}" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row pt-5 ps-3">
                            <div class="col-md-6">
                                {!!$producto->texto!!}
                            </div>
                            <div class="col-md-6">
                                <div class="fotorama" data-nav="thumbs">
                                    @if ($producto->img_uno)
                                        <img src="{{Storage::url($producto->img_uno)}}">
                                    @endif
                                    @if ($producto->img_dos)
                                        <img src="{{Storage::url($producto->img_dos)}}">
                                    @endif
                                    @if ($producto->img_tres)
                                        <img src="{{Storage::url($producto->img_tres)}}">
                                    @endif
                                    @if ($producto->img_cuatro)
                                        <img src="{{Storage::url($producto->img_cuatro)}}">
                                    @endif
                                   
                                </div>
                            </div>
                            <!--Video-->
                            <div class="col-md-6">
                                @if ($producto->enlace)
                                    <iframe width="600" height="329" src="https://www.youtube.com/embed/{{$producto->enlace}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                @endif
                            </div>
                            <div class="col-md-6">
                                @if ($producto->texto_video)
                                    {!!$producto->texto_video!!}
                                @endif
                            </div>
                        </div>
                    </div>

                    @endif
                  @endforeach
              </div>
        </div>
    </div>
    <script src="{{asset('js/filtrado.js')}}"></script>
@endsection