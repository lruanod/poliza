<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="background: linear-gradient(to bottom, #3C3E40  , #1B92F0 );">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">tupoliza.com</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                </li>
                @if(empty(session('usuario')))
                <li class="nav-item">
                    <a class="nav-link active" href="/">Ingresar</a>
                </li>
                @endif

                @if(!empty(session('usuario')))

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="true" >Pólizas</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="{{url('/polizas')}}">Registro de pólizas</a></li>
                            <li><a class="dropdown-item" href="{{url('/reportes')}}">Reporte de pólizas</a></li>
                        </ul>
                    </li>
                @endif
                @if(!empty(session('usuario')))
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="true" >{{session('usuario')}}</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="{{url('/actualizarpass')}}">Cambiar contraseña</a></li>
                            <li><a class="dropdown-item" href="{{url('/')}}">Cerrar sesión</a></li>
                        </ul>
                    </li>
                @endif

                @if(!empty(session('usuario')&&session('rol')=='Administrador'))
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="true" >Usuarios</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="{{url('/usuarios')}}">Usuarios</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
