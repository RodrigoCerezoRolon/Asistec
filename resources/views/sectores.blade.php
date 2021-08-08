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
        .Sector_titulo{
            font-family: 'Montserrat-Medium';
            color: #1D4465;
            font-size: 18px;
        }
        .Sector_link{
            text-decoration: none;
        }
    </style>
    <div class="d-flex Servicios_LineaGris align-items-center ps-5">
        <i class="fas fa-home"></i> |
        @lang('nav.sectores')
    </div>
    <div class="container-fluid ps-5">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="Servicios-TituloSeccion">
                   @lang('app.TamanoEmpresa')
                </div>
                <div class="lineaCeleste mx-auto"></div>
            </div>
            @foreach ($sectoresEmpresa as $sectorEmp)
            <div class="col-md-3  my-4 ">
                <a class="Sector_link" href="{{route('solucion',$sectorEmp->solucion_id)}}">
                    <div class="px-2 py-3" style=" background-color:#AEDADB33;height: 227px;
                    width: 288px;
                    display: flex;
                    align-items: center;">
                        <div class="" style="background-image: url({{asset(Storage::url($sectorEmp->imagen))}});
                   
                            height:90px;
                            width:100%;
                            background-size:contain;
                            background-repeat:no-repeat;
                            background-position:center;">
                            
                          </div>
                    </div>
                    
                    <div class="Sector_titulo">
                        {{$sectorEmp->titulo}}
                    </div>
                </a>
               
              </div>
            @endforeach
            <div class="col-md-12 mb-5">
                <div class="Servicios-TituloSeccion">
                    @lang('nav.sectores')
                </div>
                <div class="lineaCeleste mx-auto"></div>
            </div>
            @foreach ($sectores as $sector)
            <div class="col-md-3  my-4 ">
                <a class="Sector_link" href="{{route('solucion',$sector->solucion_id)}}">
                    <div class="px-2 py-3" style=" background-color:#AEDADB33;height: 227px;
                    width: 288px;
                    display: flex;
                    align-items: center;">
                        <div class="" style="background-image: url({{asset(Storage::url($sector->imagen))}});
                   
                            height:90px;
                            width:100%;
                            background-size:contain;
                            background-repeat:no-repeat;
                            background-position:center;">
                            
                          </div>
                    </div>
                    
                    <div class="Sector_titulo">
                        {{$sector->titulo}}
                    </div>
                </a>
               
              </div>
            @endforeach
        </div>
    </div>
@endsection