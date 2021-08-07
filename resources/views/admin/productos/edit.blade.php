@extends('home')
@section('contenido')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="container">
        <div class="row">
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Producto 
                        <a class="btn btn-outline-info float-right" href="{{route('productos.index')}}">
                            Volver
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('productos.update',$producto->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <h6>Titulo</h6>
                            <input type="text" class="form-control" name="titulo" value="{{$producto->titulo}}">
                            <h6>Titulo Ingles</h6>
                            <input type="text" class="form-control" name="titulo_en" value="{{$producto->titulo_en}}" required>
                            <h6>Titulo Italiano</h6>
                            <input type="text" class="form-control" name="titulo_it" value="{{$producto->titulo_it}}" required>
                            <h6>Texto</h6>
                            <textarea name="texto" class="textarea">{!!$producto->texto!!}</textarea>
                            <h6>Texto Ingles</h6>
                            <textarea name="texto_en" class="textarea">{!!$producto->texto_en!!}</textarea>
                            <h6>Texto Italino</h6>
                            <textarea name="texto_it" class="textarea">{!!$producto->texto_it!!}</textarea>
                            <h6>Enlace Video</h6>
                            <input type="text" class="form-control" name="enlace" value="{{$producto->enlace}}">
                            <h6>Texto Video</h6>
                            <textarea name="texto_video" class="textarea">{!!$producto->texto_video!!}</textarea>
                            <h6>Texto Video Ingles</h6>
                            <textarea name="texto_video_en"class="textarea"> {!!$producto->texto_video_en!!}</textarea>
                            <h6>Texto Video Italino</h6>
                            <textarea name="texto_video_it" class="textarea"> {!!$producto->texto_video_it!!}</textarea>
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Imagen Uno</h6>
                                    @if ($producto->img_uno)
                                    <img class="img-fluid" src="/storage/{{$producto->img_uno}}" width="300px" id="previewimg_uno">
                                    @else
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_uno">
                                    @endif
                                   
                                    <br>
                                    <input type="file" name="img_unoe" id="img_uno">
                                    {!!$errors->first('img_uno','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Dos</h6>
                                    @if ($producto->img_dos)
                                    <img class="img-fluid" src="/storage/{{$producto->img_dos}}" width="300px" id="previewimg_dos">
                                    @else
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_dos">
                                    @endif
                                    <br>
                                    <input type="file" name="img_dose" id="img_dos">
                                    {!!$errors->first('img_dos','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Tres</h6>
                                    @if ($producto->img_tres)
                                    <img class="img-fluid" src="/storage/{{$producto->img_tres}}" width="300px" id="previewimg_tres">
                                    @else
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_tres">
                                    @endif
                                    
                                    <br>
                                    <input type="file" name="img_trese" id="img_tres">
                                    {!!$errors->first('img_tres','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-6">
                                    <h6>Imagen Cuatro</h6>
                                    @if ($producto->img_cuatro)
                                    <img class="img-fluid" src="/storage/{{$producto->img_cuatro}}" width="300px" id="previewimg_cuatro">
                                    @else
                                    <img class="img-fluid" src="/storage/images/noImg.jpg" width="300px" id="previewimg_cuatro">
                                    @endif
                                   
                                    <br>
                                    <input type="file" name="img_cuatroe" id="img_cuatro">
                                    {!!$errors->first('img_cuatro','<small class="text-danger">:message</small>')!!}
                                    <br>
                                    <small class="text-muted">Resolución Recomendada 366px * 332px</small>
                                </div>
                                <div class="col-md-12">
                                    <h6>Seleccionar Soluciones</h6>
                                    {{-- @php
                                        $ids=[];
                                        foreach ($producto->soluciones as $value) {
                                            array_push($ids,$value->id);
                                        }
                                    @endphp --}}
                                    <select class="js-example-basic-multiple form-control" name="soluciones[]" multiple="multiple">
                                       @foreach ($soluciones as $solucion)

                                           <option value="{{$solucion->id}}"{{ collect($producto->soluciones->pluck('id'))->contains($solucion->id) ? 'selected' : ''}}>{{$solucion->titulo}}</option>
                                           ...
                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mt-5 text-center">
                                    <button type="submit" class="btn btn-info">
                                        Actualizar
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