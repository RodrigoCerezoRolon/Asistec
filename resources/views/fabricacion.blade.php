@extends('layouts.plantilla')
@section('contenido')
<style>
    .botton_container > button {
        border-radius: 50%;
        height: 15px!important;
        width: 15px!important;
        background-color: #FDFDFD !important;
    }
    .botton_container > button.active {
        background-color: #1EBCC1 !important;
        height: 15px!important;
        width: 15px!important;
    }
    .fila_contenido{
        border-bottom: 1px solid #ececec;margin-right: 4vh;
    }
    .slider_imagen{
        height: 43vh;width: auto;background-repeat: no-repeat!important;background-size: contain!important;
    }
    .texto_seccion{
        display:flex;flex-flow:column;justify-content:center;text-align: start;
    }
    .texto_seccion h3{
        color:#053E85;
        font-size:20px;
        font-weight:bold;
    }
    .texto_seccion p{
        color:#696A6A;
        font-size:15px;        
    }
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
    Fabricación de productos especiales
</div>
<div class="container-fluid mb-5 py-5 ps-md-5" style="">
    <div class="row">
        <div class="col-md-12 text-center Servicios-TituloSeccion" >
            Fabricación de productos especiales
            <div class="lineaCeleste mx-auto"></div>
        </div>
    </div>
</div>

    <div class="container-fluid mb-5 pb-5 ps-md-5" >
       
      @forelse ($fabricaciones as $item)
      <?php
      $cantImgs=1;
        ?>
        @if ($item->img_uno)
            @php
            $cantImgs++;
            
            @endphp
        @endif
        @if ($item->img_dos!=null)
            @php
            $cantImgs++;
            
            @endphp
        @endif
        @if ($item->img_tres!=null)
        @php
        $cantImgs++;
        
        @endphp
        @endif
        @if ($item->img_cuatro!=null)
        @php
        $cantImgs++;
        
        @endphp
        @endif
      <div class="row pb-5 mt-5 fila_contenido">     
        <div class="col-md-6 px-0"> 
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">


                                <div class="carousel-indicators" style="height: 25px;">
                                    <div class="botton_container">
                                        @for ($i = 0; $i >= $cantImgs; $i++)
                                            
                                                @if ($i==0)
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                @else
                                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$i}}" ></button>
                                                @endif
                                            
                                        @endfor
                                    </div>
                                </div>

                                <div class="carousel-inner pe-4">        
                                                @isset($item->img_uno)
                                                <div class="carousel-item active">
                                                    <div class="slider_imagen" style="background: url({{ asset(Storage::url($item->img_uno)) }});"></div>                  
                                                </div>    
                                                @endisset
                                                @isset($item->img_dos)
                                                <div class="carousel-item">
                                                    <div class="slider_imagen" style="background: url({{ asset(Storage::url($item->img_dos)) }});"></div>                  
                                                </div>    
                                                @endisset
                                                @isset($item->img_tres)
                                                <div class="carousel-item">
                                                    <div class="slider_imagen" style="background: url({{ asset(Storage::url($item->img_tres)) }});"></div>                  
                                                </div>    
                                                @endisset
                                                @isset($item->img_cuatro)
                                                <div class="carousel-item">
                                                    <div class="slider_imagen" style="background: url({{ asset(Storage::url($item->img_cuatro)) }});"></div>                  
                                                </div>    
                                                @endisset
                                
                                </div>     

                            
             </div>
       
        </div>
        <div class="col-md-6">
            <div class="texto_seccion pt-2" style="">
                <h3>{{$item->titulo}}</h3>
                <p>{!!$item->texto!!}</p>
            </div>
        </div>
    </div>
      @empty
          
      @endforelse
    
    </div>
</div>
@endsection