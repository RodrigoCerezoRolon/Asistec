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
    <div class="container-fluid my-0">
        <div class="row">
            <div class="col-md-6 pt-4 ps-5">
                <div class="Inicio_tituloSolucion">
                    {{$seccionSolucion->titulo}}
                </div>
                <div class="Inicio_textoSolucion mt-3">
                    {!!$seccionSolucion->texto!!}
                </div>
                <div class="mt-5">
                    <a class="btn rounded-pill Inicio_btnSoluciones">
                        Ver Soluciones
                    </a>
                </div>
            </div>
            <div class="col-md-6 pe-0">
                <img src="{{asset(Storage::url($seccionSolucion->imagen))}}" class="img-fluid">
            </div>
        </div>
    </div>
    <!--Seccion Nosotros-->
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center py-5" style="
        background-image:linear-gradient(rgba(29, 29, 29, 0.55),rgba(29, 29, 29, 0.65)),
        url({{url('/')}}/images/inicio/{{$seccionEmpresa->imagen}});
        height:267px
        background-repeat:no-repeat;
        background-position:center;
        ">
      
            <div class="container">
                <div class="row">
                   
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/filtrado.js')}}"></script>
@endsection