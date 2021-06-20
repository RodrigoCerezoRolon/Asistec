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
    <!--Empresa-->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="textoEmpresa">{!!$empresa->texto!!}</div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="{{asset(Storage::url($empresa->imagen))}}" style="width: 100%">
            </div>
        </div>
    </div>
    
@endsection