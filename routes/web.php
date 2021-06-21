<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','InicioController@vistaInicio')->name('inicio');
//Filtros select
Route::get('filtrarPorCategoria/{id}','CategoriasController@filtrarSelectorCategoria');
Route::get('filtrarPorSubCategoria/{id}','SubCategoriasController@filtrarSelectorSubCategoria');
//Buscar Solucion
Route::get('BuscarSolucionCategoria/{id}','SolucionesController@buscarSolucionPorCategoria')->name('solucionPorCat');
Route::get('BuscarSolucionSubCategoria/{id}','SolucionesController@buscarSolucionPorSubCategoria')->name('solucionPorSub');
Route::get('BuscarSolucionSub-SubCategoria/{id}','SolucionesController@buscarSolucionPorSubSubCategoria')->name('solucionPorSubSub');

Route::get('empresa','EmpresaController@vistaEmpresa')->name('empresa');
Route::get('soluciones','SolucionesController@vistaSoluciones')->name('soluciones');
Route::get('solucion/{id}','SolucionesController@show')->name('solucion');
Route::get('productos','ProductosController@vistaProductos')->name('productos');
Route::get('producto/{id}','ProductosController@vistaProducto')->name('producto');
Route::get('mantenimiento','MantenimientoController@vistaMantenimiento')->name('mantenimiento');
Route::get('sectores','SectoresController@vistaSectores')->name('sectores');
Route::get('casos-de-exito','CasosController@vistaCasos')->name('casos');
Route::get('clientes','ClientesController@vistaClientes')->name('clientes');
Route::get('presupuesto','ContactoController@vistaPresupuesto')->name('presupuesto');
Route::get('presupuesto/{id}','ContactoController@vistaPresupuestoProd')->name('presupuesto.prod');
Route::post('presupuestoProd','ContactoController@presupuestoProd');
Route::post('presupuesto','ContactoController@presupuesto');
Route::get('fabricacion-productos-especiales','FabricacionController@vistaFabricacion')->name('fabricacion');
Route::get('contacto','ContactoController@vistaContacto')->name('contacto');
Route::post('consulta','ContactoController@enviarConsulta')->name('consulta');

Route::get('calculadora','ProductosController@vistaCalculadora')->name('calculadora');
Route::get('adm',function(){
    return redirect('login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function(){
    //Inicio
    Route::get('home/sliders','SlidersController@EditarSlidersInicio')->name('inicio.sliders');
    Route::post('home/agregarslider','SlidersController@AgregarSlider');
    Route::get('home/editarslider/{id}','SlidersController@EditarSlider');
    Route::delete('home/eliminarslider/{id}','SlidersController@EliminarSlider');
    Route::put('home/actualizarslider/{id}','SlidersController@ActualizarSlider');
    Route::get('home/inicio/editarInicio','InicioController@editarInicio')->name('inicio.editarContenido');
    Route::put('home/inicio/actualizarSeccionEmpresa/{id}','InicioController@actualizarSeccionEmpresa')->name('inicio.actualizarSeccionEmpresa');
    Route::post('home/inicio/agregarMarca','InicioController@AgregarMarca');
     Route::get('home/inicio/editarMarca/{id}','InicioController@EditarMarca');
     Route::put('home/inicio/actualizarMarca/{id}','InicioController@ActualizarMarca');
     Route::delete('home/inicio/eliminarMarca/{id}','InicioController@EliminarMarca');
    
    Route::group(['prefix' => 'home/empresa'], function () {
        //Sliders
        Route::get('editarSliders','SlidersController@EditarSlidersEmpresa')->name('empresa.sliders');
        Route::post('agregarslider','SlidersController@AgregarSlider');
        Route::get('editarslider/{id}','SlidersController@EditarSlider');
        Route::delete('eliminarslider/{id}','SlidersController@EliminarSlider');
        Route::put('actualizarslider/{id}','SlidersController@ActualizarSlider');
        //Contenido
        Route::get('editarEmpresa','EmpresaController@editarEmpresa' )->name('empresa.editarContenido');
        Route::put('actualizarContenido', 'EmpresaController@actualizarEmpresa')->name('empresa.actualizarContenido');
     
    });
      
    //Categorias
      Route::prefix('home/categorias')->group(function () {
        Route::get('/','CategoriasController@editarCategorias')->name('productos.editarCategorias');
        Route::post('agregarCategoria','CategoriasController@agregarCategoria');
        Route::get('editarCategoria/{id}','CategoriasController@editarCategoria');
        Route::put('actualizarCategoria/{id}','CategoriasController@actualizarCategoria');
        Route::delete('eliminarCategoria/{id}','CategoriasController@eliminarCategoria');
      });
    //SubCategorias
      Route::prefix('home/subcategorias')->group(function () {
        Route::get('/','SubCategoriasController@editarSubcategorias')->name('productos.editarSubCategorias');
        Route::post('agregarSubCategoria','SubCategoriasController@agregarSubCategoria');
        Route::get('editarSubCategoria/{id}','SubCategoriasController@editarSubCategoria');
        Route::put('actualizarSubCategoria/{id}','SubCategoriasController@actualizarSubCategoria');
        Route::delete('eliminarSubCategoria/{id}','SubCategoriasController@eliminarSubCategoria');
      });
      //Sub-SubCategorias
      Route::prefix('home/sub-subcategorias')->group(function () {
        Route::get('/','SubSubCategoriaController@editarSubSubCategorias')->name('productos.editarSubSubCategorias');
        Route::post('agregarSubSubCategoria','SubSubCategoriaController@agregarSubSubCategoria');
        Route::get('editarSubSubCategoria/{id}','SubSubCategoriaController@editarSubsubCategoria');
        Route::put('actualizarSubSubCategoria/{id}','SubSubCategoriaController@actualizarSubsubCategoria');
        Route::delete('eliminarSubSubCategoria/{id}','SubSubCategoriaController@eliminarSubsubCategoria');
      });
    
    //Soluciones
    Route::resource('home/soluciones', 'SolucionesController');
    // Productos
    Route::resource('home/productos', 'ProductosController');
    //Productos Especiales
    Route::resource('home/productos-especiales','ProductosEspecialesController');
    //Servicios
    Route::resource('home/mantenimiento', 'MantenimientoController');
    //Sectores
    Route::prefix('home/sectores')->group(function () {
        Route::get('/','SectoresController@index')->name('sectores.index');
        Route::post('agregarSector','SectoresController@store')->name('sectores.store');
        Route::get('editarSector/{id}','SectoresController@edit');
        Route::put('actualizarSector/{id}','SectoresController@update');
        Route::delete('eliminarSector/{id}','SectoresController@destroy');
    });
    //Casos de exito
    Route::resource('home/casos', 'CasosController');
     //Clientes
     Route::group(['prefix' => 'home/clientes'], function () {
      Route::get('editarClientes','ClientesController@editarClientes')->name('clientes.editarContenido');
      Route::post('agregarCliente','ClientesController@agregarCliente');
      Route::get('editarCliente/{id}','ClientesController@editarCliente');
      Route::put('actualizarCliente/{id}','ClientesController@actualizarCliente');
      Route::delete('eliminarCliente/{id}','ClientesController@eliminarCliente');
 });
    //Contacto
    Route::group(['prefix' => 'home/contacto'], function () {
        Route::get('editarcontenido','ContactoController@Editarcontenido')->name('contacto.contenido');
        Route::get('editarContacto/{id}','ContactoController@EditarContacto');
        Route::put('actualizarContacto/{id}','ContactoController@ActualizarContacto');
        Route::put('actualizarIconoSup/{id}','ContactoController@actualizarIconoSup');
        Route::put('actualizarIconoInf/{id}','ContactoController@actualizarIconoInf');
    });
    //Usuarios
    Route::group(['prefix' => 'home/usuarios'], function () {
         
     Route::get('/','UsuariosController@index')->name('usuarios.index');
     Route::post('crearusuario','UsuariosController@store');
     Route::get('verusuarios','UsuariosController@verUsuarios')->name('verusuarios');
     Route::get('editarusuario/{id}','UsuariosController@edit');
     Route::put('actualizarusuario/{id}','UsuariosController@update');
     Route::delete('eliminarusuario/{id}','UsuariosController@destroy');
    });
    //Metadatos
    Route::group(['prefix' => 'home/metadatos'], function () {
        Route::get('vercontenido','MetadatosController@show')->name('vermetadatos');
        Route::get('editarmetadato/{id}','MetadatosController@edit');
        Route::put('actualizarmetadato/{id}','MetadatosController@update');
    });
    
});