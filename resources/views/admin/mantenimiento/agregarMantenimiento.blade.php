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
                        Agregar Servicio
                        <div class="float-right">
                            <a class="btn btn-outline-info" href="{{route('mantenimiento.index')}}">
                                Volver
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('mantenimiento.store')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <h6>Orden</h6>
                            <input type="text" class="form-control" name="orden">
                            {!!$errors->first('orden','<small class="text-danger">:message</small>')!!}
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo">
                            <h6>Subtitulo</h6>
                            <input type="text" class="form-control" name="subtitulo">
                            <h6>Texto</h6>
                            <textarea name="texto"></textarea>
                            {!!$errors->first('titulo','<small class="text-danger">:message</small>')!!}
                            <h6>Imagen</h6>
                            <img src="/storage/images/noImg.jpg" width="60px" id="previewImgServicios">
                            <br>
                            <input type="file" name="imgServicios" id="imgServicios">
                            {!!$errors->first('imgCat','<small class="text-danger">:message</small>')!!}
                            <br>
                            <small class="text-muted">Resolución Recomendada 60px * 60px</small>
                            <div class="col-md-12 text-center">
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
        const fileInput= document.getElementById('imgServicios');
        const img=document.getElementById('previewImgServicios')
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