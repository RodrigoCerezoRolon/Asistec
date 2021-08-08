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
    @lang('nav.Clientes')
</div>
<!--Clientes-->
<div class="container-fluid ps-5 my-3">
    <div class="row">
        <div class="col-md-2">
            <h6>@lang('app.Filtrar')</h6>
            <h6>@lang('nav.sectores')</h6>
            <form action="{{route('filtrarClientes')}}" method="POST">
                @csrf
                @foreach ($sectores as $sector_menu)
                <div class="form-check">
                    <input class="form-check-input" name="sector" type="checkbox" value="{{$sector_menu->id}}" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                    {{$sector_menu->titulo}}
                    </label>
                </div>
                @endforeach
            <h6>@lang('app.TamanoEmpresa')</h6>
            @foreach ($sectoresEmpresa as $sectorEmpresa)
            <div class="form-check">
                <input class="form-check-input" name="tipo" type="checkbox" value="{{$sectorEmpresa->id}}" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                {{$sectorEmpresa->titulo}}
                </label>
            </div>
            @endforeach
            <button type="submit" class="btn rounded-pill btn-outline mt-3 " style="color:#1EBCC1;border:1px solid #1EBCC1;font-family:'Roboto-Bold';font-size:13px;text-transform:uppercase">
                @lang('app.BtnBuscar')
            </button>
            </form>
        </div>
        <div class="col-md-10">
            <div class="row">
                @foreach ($clientes as $cliente)
                    <div class="col-md-3  my-4" >
                        <div class="border p-3">
                            <div class="" style="background-image: url({{asset(Storage::url($cliente->imagen))}});
                                height:120px;
                                width:100%;
                                background-size:contain;
                                background-repeat:no-repeat;
                                background-position:center;">
                                
                            </div>
                        </div>
                        @if ($cliente->caso_id!=null)
                        <a href="casos-de-exito#caso{{$cliente->caso_id}}" class="btn rounded-pill btn-outline mt-3 " style="color:#1EBCC1;border:1px solid #1EBCC1;font-family:'Roboto-Bold';font-size:13px;text-transform:uppercase">
                            @lang('nav.Casos')
                        </a>
                        @endif
                        
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
