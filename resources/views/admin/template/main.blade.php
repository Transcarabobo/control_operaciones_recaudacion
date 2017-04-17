<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    @yield('link')
    
    <title>@yield('title', 'Default') | Panel de Administración</title>
</head>
<body>
    @include('admin.template.partial.nav')
    
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>@yield('title')</h1></div>
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <footer class="admin-footer">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <p class="navbar-text">Todos los derechos reservados &copy {{ date('Y') }} </p>
                <p class="navbar-text navbar-right"><b>Transcarabobo C.A.</b></p>
            </div>
          </div>
        </nav>
    </footer>
    
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('js')
</body>
</html>