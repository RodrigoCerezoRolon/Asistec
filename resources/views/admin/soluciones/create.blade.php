@extends('home')
@section('contenido')
    <div class="container">
        <div class="card">
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
            <div class="card-header">
                Agregar Solucion
                <div class="float-right">
                    <a href="{{route('soluciones.index')}}" class="btn btn-outline-info">
                        Volver
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form id="myForm" action="{{route('soluciones.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <h6>Titulo</h6>
                        <input type="text" class="form-control" name="titulo" required>
                        <h6>Titulo Ingles</h6>
                        <input type="text" class="form-control" name="titulo_en" required>
                        <h6>Titulo Italiano</h6>
                        <input type="text" class="form-control" name="titulo_it" required>
                    </div>
                    <div class="col-12">
                        <h6>Texto</h6>
                        <textarea name="texto" id="texto"></textarea>
                        <h6>Texto Ingles</h6>
                        <textarea name="texto_en" id="texto"></textarea>
                        <h6>Texto Italiano</h6>
                        <textarea name="texto_it" id="texto"></textarea>
                    </div>
                    <div class="col-12">
                        <h6>Imagen</h6>
                        <input type="file" name="img1"  required>
                        <br>
                        <small>Resolucion Recomendada 1366px * 302px</small>
                    </div>
                    <div class="col-md-12">
                        <label>Seleccione Categoria o Subcategoria a vincular:</label>
                                <br>
                                <input type="radio" id="age1" name="tipo" value="categoria" required/>
                                <label for="age1">Categoria</label><br>
                                <input type="radio" id="age2" name="tipo" value="subcategoria"/>
                                <label for="age2">Subcategoria</label><br> 
                                <input type="radio" id="age3" name="tipo" value="subsubcategoria"/>
                                <label for="age3">Sub-Subcategoria</label><br> 
                                <div class="categorias d-none">
                                    <select class="form-control" name="category_id" >
                                        @if (!$categorias->isEmpty())
                                            <option value="" selected>Seleccionar Categoria</option>
                                            @foreach ($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                                            @endforeach
                                        @else
                                            <option value="" selected>No hay categorias cargadas</option>
                                        @endif
                            
                                    </select>
                                </div>
                                <div class="subcategorias d-none">
                                    <select class="form-control" name="subcategory_id">
                                        @if (!$subcategorias->isEmpty())
                                            <option value="" selected>Seleccionar subcategoria</option>
                                            @foreach ($subcategorias as $subcategoria)
                                            <option value="{{$subcategoria->id}}">{{$subcategoria->categoria->nombre}}-{{$subcategoria->nombre}}</option>
                                            @endforeach
                                        @else
                                            <option value="" selected>No hay subcategoria cargadas</option>
                                        @endif
                            
                                    </select>
                                </div>
                                <div class="subsubcategorias d-none">
                                    <select class="form-control" name="sub_subcategory_id" >
                                        @if (!$subsubcategorias->isEmpty())
                                            <option value="" selected>Seleccionar SubSubCategoria</option>
                                            @foreach ($subsubcategorias as $subsubcategoria)
                                            <option value="{{$subsubcategoria->id}}">{{$subsubcategoria->subcategoria->categoria->nombre}}-{{$subsubcategoria->subcategoria->nombre}}-{{$subsubcategoria->nombre}}</option>
                                            @endforeach
                                        @else
                                            <option value="" selected>No hay categorias cargadas</option>
                                        @endif
                            
                                    </select>
                                </div>
                    </div>     
                    <div class="col-12 text-center">
                        <button class="btn btn-info" type="submit">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
          $(function(){
            $('textarea').summernote({
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
           $('input[type=radio][name=tipo]').on('change',function(){
                   let tipo=$(this).val(); 
                   if(tipo=='categoria'){
                       $('.categorias').removeClass('d-none');
                       $('#select_categorias').prop('required',true);
                        $("#select_subcategorias").prop('required',false);
                       $('.subcategorias').addClass('d-none');
                       $('.subsubcategorias').addClass('d-none');
                   }
                   if(tipo=='subcategoria'){
                       $('.categorias').addClass('d-none');
                       $('#select_subcategorias').prop('required',true);
                        $("#select_categorias").prop('required',false);
                       $('.subcategorias').removeClass('d-none');
                       $('.subsubcategorias').addClass('d-none');
                   }
                   if(tipo=='subsubcategoria'){
                       $('.categorias').addClass('d-none');
                       $('.subcategorias').addClass('d-none');
                       $('#select_subcategorias').prop('required',false);
                        $("#select_categorias").prop('required',false);
                       $('.subsubcategorias').removeClass('d-none');
                   }
               });
       });
         $('#myForm').on('submit', function(e) {
  
            if($('#texto').summernote('isEmpty')) {
               swal("Complete el texto","","warning");

                // cancel submit
                e.preventDefault();
            }
            else {
                // do action
            }
        });
    
    </script>
@endsection