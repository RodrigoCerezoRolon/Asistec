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
<div class="container-fluid ps-5">
    <div class="row">
        @foreach ($clientes as $cliente)
            <div class="col-md-2  my-4" >
                <div class="border p-3">
                    <div class="" style="background-image: url({{asset(Storage::url($cliente->imagen))}});
                        height:120px;
                        width:100%;
                        background-size:contain;
                        background-repeat:no-repeat;
                        background-position:center;">
                        
                    </div>
                </div>
              
            </div>
        @endforeach
    </div>
</div>
@endsection
