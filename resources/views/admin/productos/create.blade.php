@extends('home')
@section('contenido')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="container">
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
                        Agregar Producto 
                        <a class="btn btn-outline-info float-right" href="{{route('productos.index')}}">
                            Volver
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo">
                            <h6>Texto</h6>
                            <textarea name="texto" class="textarea"></textarea>
                            <h6>Enlace Video</h6>
                            <input type="text" class="form-control" name="enlace">
                            <h6>Texto Video</h6>
                            <textarea name="texto_video" class="textarea"></textarea>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Imagen Uno</h6>
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_uno">
                                    <br>
                                    <input type="file" name="img_uno" id="img_uno">
                                    {!!$errors->first('img_uno','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 606px * 329px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Dos</h6>
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_dos">
                                    <br>
                                    <input type="file" name="img_dos" id="img_dos">
                                    {!!$errors->first('img_dos','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 606px * 329px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Tres</h6>
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_tres">
                                    <br>
                                    <input type="file" name="img_tres" id="img_tres">
                                    {!!$errors->first('img_tres','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 606px * 329px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Cuatro</h6>
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_cuatro">
                                    <br>
                                    <input type="file" name="img_cuatro" id="img_cuatro">
                                    {!!$errors->first('img_cuatro','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 606px * 329px</small>
                                </div>
                                <div class="col-md-12">
                                    <h6>Seleccionar Soluciones</h6>
                                    <select class="js-example-basic-multiple form-control" name="soluciones[]" multiple="multiple">
                                       @foreach ($soluciones as $solucion)
                                           <option value="{{$solucion->id}}">{{$solucion->titulo}}</option>
                                           ...
                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mt-5 text-center">
                                    <button type="submit" class="btn btn-info">
                                        Agregar
                                    </button>
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
         });
         const fileInputuno= document.getElementById('img_uno');
        const imguno=document.getElementById('previewimg_uno')
        fileInputuno.addEventListener('change',(e)=>{
            const fileUno= e.target.files[0];
            const fileReaderUno= new FileReader();
            fileReaderUno.readAsDataURL(fileUno);
            fileReaderUno.addEventListener('load',(e)=>{
                imguno.setAttribute('src',e.target.result);
            });
        });
        const fileInputdos= document.getElementById('img_dos');
        const imgdos=document.getElementById('previewimg_dos')
        fileInputdos.addEventListener('change',(e)=>{
            const fileDos= e.target.files[0];
            const fileReaderDos= new FileReader();
            fileReaderDos.readAsDataURL(fileDos);
            fileReaderDos.addEventListener('load',(e)=>{
            imgdos.setAttribute('src',e.target.result);
            });
        });
        const fileInputtres= document.getElementById('img_tres');
        const imgtres=document.getElementById('previewimg_tres')
        fileInputtres.addEventListener('change',(e)=>{
            const fileTres= e.target.files[0];
            const fileReaderTres= new FileReader();
            fileReaderTres.readAsDataURL(fileTres);
            fileReaderTres.addEventListener('load',(e)=>{
                imgtres.setAttribute('src',e.target.result);
            });
        });
        const fileInputcuatro= document.getElementById('img_cuatro');
        const imgcuatro=document.getElementById('previewimg_cuatro')
        fileInputcuatro.addEventListener('change',(e)=>{
            const fileCuatro= e.target.files[0];
            const fileReaderCuatro= new FileReader();
            fileReaderCuatro.readAsDataURL(fileCuatro);
            fileReaderCuatro.addEventListener('load',(e)=>{
                imgcuatro.setAttribute('src',e.target.result);
            });
        });
    </script>
@endsection