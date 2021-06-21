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
    .Caso_titulo{
        font-family: 'Roboto-Bold';
        font-size: 20px;
        color: #053E85;
        margin-top: 50px
    }
    .Caso_texto{
        font-family: 'Roboto-Medium';
        font-size: 15px;
        color: #696A6A;
        margin-bottom: 50px;
    }
</style>
<div class="d-flex Servicios_LineaGris align-items-center ps-5">
    <i class="fas fa-home"></i> |
    Casos de éxito
</div>
<div class="container-fluid ps-5 py-5">
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="Servicios-TituloSeccion">
                Casos de éxito
            </div>
            <div class="lineaCeleste mx-auto"></div>
        </div>
        @foreach ($casos as $caso)
            <div class="col-md-6 mb-5">
                <img src="{{asset(Storage::url($caso->imagen))}}" class="img-fluid">
            </div>
            <div class="col-md-6 pt-5 mb-5">
                <img src="{{asset(Storage::url($caso->logo))}}" class="img-fluid">
                <div class="Caso_titulo">
                    {{$caso->titulo}}
                </div>
                <div class="Caso_texto">
                    {!!$caso->texto!!}
                </div>
                <a href="{{asset(Storage::url($caso->archivo))}}" download="" class="btn rounded-pill btn-outline" style="color:#1EBCC1;border:1px solid #1EBCC1">
                    Descargar Caso
                </a>
            </div>  
            <hr>
        @endforeach
    </div>
</div>
@endsection