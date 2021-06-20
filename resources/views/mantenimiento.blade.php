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
        Mantenimiento
    </div>
    <!--Servicios-->
    <div class="container-fluid ps-5 my-5">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="Servicios-TituloSeccion">
                    Mantenimiento
                </div>
                <div class="lineaCeleste mx-auto"></div>
            </div>
            @foreach ($servicios as $servicio)
                <div class="col-md-6 mb-5">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="img-fluid d-block mx-auto" src="{{asset(Storage::url($servicio->imagen))}}">
                        </div>
                        <div class="col-md-10">
                            <div class="ServiciosTitulo">{{$servicio->titulo}}</div>
                            <div class="Servicios-SubTitulo">{{$servicio->subtitulo}}</div>
                            <div class="ServiciosTexto">{!!$servicio->texto!!}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
   
@endsection