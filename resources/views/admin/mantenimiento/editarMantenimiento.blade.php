@extends('home')
@section('contenido')
    <div class="container-fluid mt-3">
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
                        Editar Servicio
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('mantenimiento.index')}}">
                                Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('mantenimiento.update',$servicio->id)}}" enctype="multipart/form-data" method="POST">
                            @method('PUT')
                            @csrf
                            <h6>Orden</h6>
                            <input type="text" class="form-control" name="orden" value="{{$servicio->orden}}">
                            {!!$errors->first('orden','<small class="text-danger">:message</small>')!!}
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo" value="{{$servicio->titulo}}">
                            {!!$errors->first('titulo','<small class="text-danger">:message</small>')!!}
                            <h6>Titulo Ingles</h6>
                            <input type="text" class="form-control" name="titulo_en" value="{{$servicio->titulo_en}}">
                            <h6>Titulo Italiano</h6>
                            <input type="text" class="form-control" name="titulo_it" value="{{$servicio->titulo_it}}">
                            <h6>Subtitulo</h6>
                            <input type="text" class="form-control" name="subtitulo"  value="{{$servicio->subtitulo}}">
                            <h6>Subtitulo Ingles</h6>
                            <input type="text" class="form-control" name="subtitulo_en" value="{{$servicio->subtitulo_en}}">
                            <h6>Subtitulo Italiano</h6>
                            <input type="text" class="form-control" name="subtitulo_it" value="{{$servicio->subtitulo_it}}">
                            <h6>Texto</h6>
                            <textarea name="texto">{!!$servicio->texto!!}</textarea>
                            {!!$errors->first('titulo','<small class="text-danger">:message</small>')!!}
                            <h6>Texto Ingles</h6>
                            <textarea name="texto_en" class="textarea">{!!$servicio->texto_en!!}</textarea>
                            <h6>Texto Italiano</h6>
                            <textarea name="texto_it" class="textarea">{!!$servicio->texto_it!!}</textarea>
                            <h6>Imagen</h6>
                            <img src="/storage/{{$servicio->imagen}}" width="60px" id="previewImgServicio">
                            <br>
                            <input type="file" name="imgServiciose" id="imgServicio">
                            {!!$errors->first('imgCat','<small class="text-danger">:message</small>')!!}
                            <br>
                            <small class="text-muted">Resolución Recomendada 60px * 60px</small>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info">
                                    Actualizar
                                </button>
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
                 lang: 'es-ES',
                 height: 230,
                     fontNames: ['Roboto-Bold', 'Roboto-Light', 'Roboto-Medium', 'Roboto-Regular', 'Roboto-SemiBold'],
                     toolbar: [
                     ['style', ['style']],
                     ['font', ['bold', 'underline', 'clear']],
                     ['fontNames', ['fontname']],
                     ['color', ['color']],
                     ['para', ['ul', 'ol', 'paragraph']]
                     
                     ]
             });
         });
        const fileInput= document.getElementById('imgServicio');
        const img=document.getElementById('previewImgServicio')
        fileInput.addEventListener('change',(e)=>{
            const file= e.target.files[0];
            const fileReader= new FileReader();
            fileReader.readAsDataURL(file);
            fileReader.addEventListener('load',(e)=>{
            img.setAttribute('src',e.target.result);
            });
        });

    </script>
    
@endsection