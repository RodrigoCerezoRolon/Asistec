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
            Editar Solucion
            <div class="float-right">
                <a href="{{route('soluciones.index')}}" class="btn btn-outline-info">
                    Volver
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('soluciones.update',$solucion->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <h6>Titulo</h6>
                    <input type="text" class="form-control" name="titulo" value="{{$solucion->titulo}}">
                </div>
                <div class="col-12">
                    <h6>Texto</h6>
                    <textarea name="texto">{!!$solucion->texto!!}</textarea>
                </div>
                <div class="col-12">
                    <h6>Imagen</h6>
                    @if ($solucion->imagen)
                        <img src="{{asset(Storage::url($solucion->imagen))}}">
                        <br>
                    @endif
                    <input type="file" name="img1" >
                    <br>
                    <small>Resolucion Recomendada 1366px * 302px</small>
                </div>
                <div class="col-12">
                    <label>Seleccione Categoria,Subcategoria,o SubSubCategoria a vincular:</label>
                    <br>
                    @if($solucion->subcategory_id==null)
                    <input type="hidden" id="subcategory_id" value="0">
                    @else 
                    <input type="hidden" id="subcategory_id" value="{{$solucion->subcategory_id}}">
                    @endif
                    
                    @if($solucion->category_id==null)
                    <input type="hidden" id="category_id" value="0">
                    @else 
                    <input type="hidden" id="category_id" value="{{$solucion->category_id}}">
                    @endif
                    @if($solucion->sub_subcategory_id==null)
                    <input type="hidden" id="sub_subcategory_id" value="0">
                    @else
                    <input type="hidden" id="sub_subcategory_id" value="{{$solucion->sub_subcategory_id}}">
                    @endif
                    
                    <input type="radio" id="age1" name="tipo" value="categoria" />
                    <label for="age1">Categoria</label><br>
                    <input type="radio" id="age2" name="tipo" value="subcategoria"/>
                    <label for="age2">Subcategoria</label><br> 
                    <input type="radio" id="age3" name="tipo" value="subsubcategoria"/>
                    <label for="age3">Sub-Subcategoria</label><br> 
                    <div class="categorias d-none">
                        <select class="form-control" name="category_id" id="selectcategorias" >
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
                        <select class="form-control" name="subcategory_id" id="selectsubcategorias">
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
                        <select class="form-control" name="sub_subcategory_id" id="select_subsubcategorias" >
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
                    <button class="btn btn-info" type="submit">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
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
         let categoria=$('#category_id').val();
            let subcategoria=$('#subcategory_id').val();
            let subsubcategoria=$('#sub_subcategory_id').val();
            if(categoria!=0){
                        $('.categorias').removeClass('d-none');
                        $('#selectcategorias').prop('required',true);
                        $("#selectsubcategorias").prop('required',false);
                        $('.subcategorias').addClass('d-none');
                        $('#selectcategorias').val(categoria);
                        //$('#selectsubcategorias').val("");
                        $("#age1").prop("checked", true);
            }
            if(categoria==null){
                        $('.categorias').removeClass('d-none');
                        $('#selectcategorias').prop('required',true);
                        $("#selectsubcategorias").prop('required',false);
                        $('.subcategorias').addClass('d-none');
                      
            }
            if(subcategoria!=0){
                        $('.categorias').addClass('d-none');
                        $('#selectsubcategorias').prop('required',true);
                         $("#selectcategorias").prop('required',false);
                        $('.subcategorias').removeClass('d-none');
                        $('#selectsubcategorias').val(subcategoria);
                        $("#age2").prop("checked", true);
            }
            
            if(subsubcategoria!=0){
                         $('.categorias').addClass('d-none');
                         $('.subcategorias').addClass('d-none');
                        $('#selectsubcategorias').prop('required',false);
                         $("#selectcategorias").prop('required',false);
                       
                        $('#select_subsubcategorias').val(subsubcategoria);
                        $("#age3").prop("checked", true);
                        $('.subsubcategorias').removeClass('d-none');
            }
            if(subsubcategoria==null){

            }
            $('input[type=radio][name=tipo]').on('change',function(){
                    let tipo=$(this).val(); 
                  if(tipo=='categoria'){
                        $('.categorias').removeClass('d-none');
                        $('#selectcategorias').prop('required',true);
                         $("#selectsubcategorias").prop('required',false);
                         //Valores
                         $('#selectsubcategorias').val('');
                         $('#select_subsubcategorias').val('');
                        $('.subcategorias').addClass('d-none');
                        $('.subsubcategorias').addClass('d-none');
                    }
                    if(tipo=='subcategoria'){
                        $('.categorias').addClass('d-none');
                        $('#selectsubcategorias').prop('required',true);
                         $("#selectcategorias").prop('required',false);
                          //Valores
                          $('#selectcategorias').val('');
                         $('#select_subsubcategorias').val('');
                        $('.subcategorias').removeClass('d-none');
                        $('.subsubcategorias').addClass('d-none');
                    }
                    if(tipo=='subsubcategoria'){
                        $('.categorias').addClass('d-none');
                        $('.subcategorias').addClass('d-none');
                        $('#selectsubcategorias').prop('required',false);
                         $("#selectcategorias").prop('required',false);
                        $('.subsubcategorias').removeClass('d-none');
                         //Valores
                         $('#selectcategorias').val('');
                         $('#selectsubcategorias').val('');
                    }
            });
     });

</script>
@endsection