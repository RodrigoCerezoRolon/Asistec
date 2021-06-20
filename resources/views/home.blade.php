
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="{{asset('css/fonts.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/fontawesome/css/all.min.css')}}">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="{{asset('css/azzara.min.css')}}" rel="stylesheet">

{{-- <link href="{{asset('summernote/summernote-lite.min.css')}}" rel="stylesheet">
<script src="{{asset('summernote/summernote-lite.min.js')}}"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="{{asset('summernote/lang/summernote-es-ES.js')}}"></script>
<script src="{{asset('js/jquery.validate/jquery.validate.min.js')}}"></script>
</head>
<body>
    <div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="index.html" class="logo">
					
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
                        
                        <li class="nav-item dropdown">
                        <a class="btn btn-info" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<?php 
	$routeName = Route::currentRouteName();


switch ($routeName) {
	case 'inicio.sliders':
		$inicio_active = 'active';
		break;
	case 'inicio.editarContenido':
		$inicio_active = 'active';
		break;
	case 'empresa.editarContenido':
		$empresa_active = 'active';
		break;
	case 'soluciones.index':
	case 'soluciones.edit':
	case 'soluciones.create':
		$soluciones_active = 'active';
		break;
	case 'mantenimiento.index':
	case 'mantenimiento.create':
	case 'mantenimiento.edit':
		$servicios_active= 'active';
	break;
	case 'sectores.index':
		$sectores_active='active';
		break;
	case 'productos.editarContenido':
		$productos_active = 'active';
		break;
	case 'vermetadatos':
		$metadatos_active= 'active';
		break;
	case 'calidad.editarContenido':
		$calidad_active='active';
		break;
	case 'calidad.sliders':
		$calidad_active='active';
		break;
	case 'contacto.contenido':
		$contacto_active = 'active';
	break;	
	case 'usuarios.index':
		$usuarios_active = 'active';
		break;
	case 'verusuarios':
		$usuarios_active = 'active';
		break;
}
		?>
		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					
					<ul class="nav">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Panel Asistec</h4>
						</li>
						 <li class="nav-item {{$inicio_active ?? ''}} ">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-home"></i>
								<p>Inicio</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('inicio.sliders')}}">
												<span class="sub-item">Sliders</span>
										</a>
									</li>
									<li>
									<a href="{{route('inicio.editarContenido')}}">
										<span class="sub-item">Contenido</span>
									</a>
									</li>
								</ul>
							</div>
						</li>
					<li class="nav-item {{$empresa_active ?? ''}} ">
							<a data-toggle="collapse" href="#empresa">
								<i class="fas fa-building"></i>
								<p>Empresa</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="empresa">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('empresa.sliders')}}">
												<span class="sub-item">Sliders</span>
										</a>
									</li>
									<li>
									<a href="{{route('empresa.editarContenido')}}">
										<span class="sub-item">Contenido</span>
									</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item {{$productos_active ?? ''}}">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-store"></i>
								<p>Categorias</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
										<li>
										<a href="{{route('productos.editarCategorias')}}">
												<span class="sub-item">Categorias</span>
											</a>
										</li>
										<li>
											<a href="{{route('productos.editarSubCategorias')}}">
													<span class="sub-item">SubCategorias</span>
											</a>
										</li>
										<li>
											<a href="{{route('productos.editarSubSubCategorias')}}">
													<span class="sub-item">Sub-SubCategorias</span>
											</a>
										</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item {{$soluciones_active ?? ''}} ">
							<a data-toggle="collapse" href="#soluciones">
								<i class="fas fa-building"></i>
								<p>Soluciones</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="soluciones">
								<ul class="nav nav-collapse">
									<li>
									<a href="{{route('soluciones.index')}}">
										<span class="sub-item">Editar</span>
									</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item {{$diseno_active ?? ''}}">
							<a data-toggle="collapse" href="#productos">
								<i class="fas fa-pencil-ruler"></i>
								<p>Productos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="productos">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('productos.index')}}">
											<span class="sub-item">Productos</span>
										</a>
									</li>
								</ul>
							</div>
						</li>	
						<li class="nav-item {{$diseno_active ?? ''}}">
							<a data-toggle="collapse" href="#productos_especiales">
								<i class="fas fa-pencil-ruler"></i>
								<p>Productos Especiales</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="productos_especiales">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('productos-especiales.index')}}">
											<span class="sub-item">Editar Productos</span>
										</a>
									</li>
								</ul>
							</div>
						</li>	
						<li class="nav-item {{$servicios_active ?? ''}}">
							<a data-toggle="collapse" href="#servicios">
								<i class="fas fa-concierge-bell"></i>
								<p>Mantenimiento</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="servicios">
								<ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('mantenimiento.index')}}">
                                                <span class="sub-item">Servicios</span>
                                        </a>
                                    </li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item {{$sectores_active ?? ''}}">
							<a data-toggle="collapse" href="#sectores">
								<i class="fas fa-concierge-bell"></i>
								<p>Sectores</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sectores">
								<ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('sectores.index')}}">
                                                <span class="sub-item">Editar Sectores</span>
                                        </a>
                                    </li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item {{$casos_active ?? ''}}">
							<a data-toggle="collapse" href="#casos">
								<i class="fas fa-building"></i>
								<p>Casos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="casos">
								<ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('casos.index')}}">
                                                <span class="sub-item">Editar Casos</span>
                                        </a>
                                    </li>
								</ul>
							</div>
						</li>
						<li class="nav-item {{$clientes_active ?? ''}} ">
							<a data-toggle="collapse" href="#clientes">
								<i class="fas fa-users"></i>
								<p>Clientes</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="clientes">
								<ul class="nav nav-collapse">
									<li>
									<a href="{{route('clientes.editarContenido')}}">
										<span class="sub-item">Editar</span>
									</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item {{$contacto_active ?? ''}} ">
							<a data-toggle="collapse" href="#contacto">
								<i class="fas fa-address-book"></i>
								<p>Contacto</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="contacto">
								<ul class="nav nav-collapse">
									<li>
									<a href="{{route('contacto.contenido')}}">
											<span class="sub-item">Editar </span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						
					
					<li class="nav-item {{$usuarios_active ?? ''}} ">
							<a data-toggle="collapse" href="#custompages">
								<i class="fas fa-user"></i>
								<p>Usuarios</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="custompages">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('usuarios.index')}}">
											<span class="sub-item">Crear Usuario</span>
										</a>
									</li>
									<li>
										<a href="{{route('verusuarios')}}">
											<span class="sub-item">Editar Usuario</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
					<li class="nav-item {{$metadatos_active ?? ''}}">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-globe"></i>
								<p>Metadatos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
                            <ul class="nav nav-collapse">
									<li>
										<a href="{{route('vermetadatos')}}">
											<span class="sub-item">Editar</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>  
					</ul>
					
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
                @yield('contenido')
                @if (Request::is('home'))
        <h1 class="text-center mt-5">Bienvenido/a:<br> {{Auth::user()->username}}</h1>
            @endif
			</div>
			
		</div>
		
    </div>
    <script src="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('js/ready.min.js')}}"></script>
    <script src="{{asset('js/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

</body>
</html>


   