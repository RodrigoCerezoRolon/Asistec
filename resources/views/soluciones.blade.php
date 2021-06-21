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
<div class="container-fluid my-0">
    <div class="row">
        <div class="col-md-6 pt-4 ps-5">
            <div class="Inicio_tituloSolucion">
                Productos especiales
            </div>
            <div class="Inicio_textoSolucion mt-3">
                Fabricamos equipos hidráulicos exclusivos para la necesidad de cada uno de nuestros clientes. Nuestros equipos estan caracterizados por un alto rendimiento y confiabilidad, construidos en chapa de acero. Todos los componentes se encuentran montado sobre la tapa provista de cancamos, que simplifican su desplazamiento.
            </div>
            <div class="mt-5">
                <a href="{{route('fabricacion')}}" class="btn rounded-pill Inicio_btnSoluciones">
                    Ver Más
                </a>
            </div>
        </div>
        <div class="col-md-6 pe-0">
            <img src="{{asset(Storage::url($seccionSolucion->imagen))}}" class="img-fluid">
        </div>
    </div>
</div>
<script src="{{asset('js/filtrado.js')}}"></script>
@endsection