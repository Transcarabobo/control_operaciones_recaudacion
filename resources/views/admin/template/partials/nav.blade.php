<nav class="navbar navbar-inverse">
	<div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
				@if(Auth::user())
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
				@endif
	      <img alt="Transcarabobo" class="logo-nav" src="{{ asset('img/transcarabobo_blanco.png') }}">
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    @if(Auth::user())
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registro<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          	<li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
	            <li><a href="{{ route('admin.operators.index') }}">Operadores</a></li>
	            <li><a href="{{ route('admin.vehicles.index') }}">Vehiculos</a></li>
	            <li><a href="{{ route('admin.routes.index') }}">Rutas</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Despachos</a></li>
	            <li><a href="#">Recaudación</a></li>
	          </ul>
	        </li>
	        <li><a href="consulta.html">Consulta</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          	<li><a href="index.html">Cambiar Contraseña</a></li>
	        	<li><a href="{{ route('admin.auth.logout') }}">Salir</a></li>
	          </ul>
	         </li>
	      </ul>
	    @endif
	    </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
