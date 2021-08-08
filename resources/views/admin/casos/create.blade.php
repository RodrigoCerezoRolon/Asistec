@extends('home')
@section('contenido')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Agregar Caso 
                        <a  class="btn btn-outline-info float-right " href="{{route('casos.index')}}">
                            Volver
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('casos.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6>Orden</h6>
                            <input type="text" class="form-control" name="orden">
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo">
                            <h6>Titulo Ingles</h6>
                            <input type="text" class="form-control" name="titulo_en">
                            <h6>Titulo Italiano</h6>
                            <input type="text" class="form-control" name="titulo_it">
                            <h6>Texto</h6>
                            <textarea name="texto" class="textarea"></textarea>
                            <h6>Texto Ingles</h6>
                            <textarea name="texto_en" class="textarea"></textarea>
                            <h6>Texto Italiano</h6>
                            <textarea name="texto_it" class="textarea"></textarea>
                            <h6>Logo</h6>
                            <input type="file" name="logo">
                            <h6>Imagen</h6>
                            <input type="file" name="img">
                            <div class="">
                                <h6>Seleccionar Soluciones</h6>
                                <select class="js-example-basic-multiple form-control" name="soluciones[]" multiple="multiple">
                                   @foreach ($soluciones as $solucion)
                                       <option value="{{$solucion->id}}">{{$solucion->titulo}}</option>
                                       ...
                                   @endforeach
                                </select>
                            </div>
                            <h6>Archivo</h6>
                            <input type="file" name="arch">
                            <div class="text-center">
                                <button type="submit" class="btn btn-info">
                                    Agregar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('.js-example-basic-multiple').select2();
            $('.textarea').summernote({
                 height: 250,
                     fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold'],
                     toolbar: [
                     ['style', ['style']],
                     ['font', ['bold', 'underline', 'clear']],
                     ['fontNames', ['fontname']],
                     ['color', ['color']],
                     ['para', ['ul', 'ol', 'paragraph']]
                     
                     ]
             });
        })
    </script>
@endsection