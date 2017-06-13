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
	          @role('administrator')
				<li>{!! link_to_route('admin.permissions.index', 'Permisos') !!}</li>
				<li>{!! link_to_route('admin.roles.index', 'Roles') !!}</li>
				<li>{!! link_to_route('admin.users.index', 'Usuarios') !!}</li>
				<li role="separator" class="divider"></li>
	          @endrole
	          @role('operations')
	            <li>{!! link_to_route('admin.operators.index', 'Operadores') !!}</li>
	            <li>{!! link_to_route('admin.vehicles.index', 'Vehiculos') !!}</li>
	            <li>{!! link_to_route('admin.routes.index', 'Rutas') !!}</li>
	            <li role="separator" class="divider"></li>
			  @endrole
	            <li>{!! link_to_route('admin.despatches.index', 'Despachos') !!}</li>
	            <li><a href="#">Recaudación</a></li>
	          </ul>
	        </li>
	        <li><a href="consulta.html">Consulta</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	          	<li>{!! link_to_route('admin.users.password', 'Cambiar Contraseña') !!}</li>
	        	<li>{!! link_to_route('admin.auth.logout', 'Salir') !!}</li>
	          </ul>
	         </li>
	      </ul>
	    @endif
	    </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
