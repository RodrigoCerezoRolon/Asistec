@extends('home')
@section('contenido')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        Editar Empresa
                    </div>
                    <div class="card-body">
                        <form action="{{route('empresa.actualizarContenido')}}" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                @method('PUT')
                                @csrf
                                <div class="col-6">
                                    <h6>Texto</h6>
                                    <textarea name="texto">{!!$empresa->texto!!}</textarea>
                                    <h6>Texto Ingles</h6>
                                    <textarea name="texto_en">{!!$empresa->texto_en!!}</textarea>
                                    <h6>Texto Italiano</h6>
                                    <textarea name="texto_it">{!!$empresa->texto_it!!}</textarea>
                                </div>
                                <div class="col-6">
                                    <h6>Imagen</h6>
                                    <img src="{{asset(Storage::URL($empresa->imagen))}}" class="img-fluid">
                                    <input type="file" name="imgEmpresa" >
                                    <br>
                                    <small>Resolucion Recomendada 683px * 358px</small>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-info" type="submit">Modificar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
             $('textarea').summernote({
                 height: 250,
                 fontNames: ['Roboto-Bold', 'Roboto-Light', 'Roboto-Medium', 'Roboto-Regular', 'Roboto-SemiBold'],
        fontNamesIgnoreCheck:['Roboto-Bold', 'Roboto-Light', 'Roboto-Medium', 'Roboto-Regular', 'Roboto-SemiBold'],
                     toolbar: [
                     ['style', ['style']],
                     ['font', ['bold', 'underline', 'clear']],
                     ['fontNames', ['fontname']],
                     ['color', ['color']],
                     ['para', ['ul', 'ol', 'paragraph']]
                     
                     ]
             });
         });
    
    </script>
@endsection