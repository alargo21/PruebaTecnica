    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Prueba Tecnica</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <script src="dist/js/adminlte.js"></script>

        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div id="app">
            <div class="wrapper">

                {{-- <!-- Navbar --> --}}
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        </li>
                    </ul>

                    {{-- <!-- SEARCH FORM --> --}}
                    <form class="form-inline ml-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-nav ml-auto">
                        
                    </ul>
                </nav>
        
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Logo -->
                    <a href="{{ url('/') }}" class="brand-link">
                        <span class="brand-text font-weight-light">Prueba Tecnica</span>
                    </a>


                    <div class="sidebar">
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            
                            <div class="info">
                                <a href="#" class="d-block">
                                    @guest
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                    @else
                                    <div class="image">
                                        <img src="{{ asset('imagenes/'.Auth::user()->imagen) }}" class="img-circle elevation-2" alt="User Image">
                                    </div>
                                    {{ Auth::user()->name }}
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                    @endguest
                                </a>
                            </div>
                        </div>

                        <!-- Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">

                                <li class="nav-item">
                                    <a href="{{url('/')}}"
                                        class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>Inicio</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{url('usuarios')}}"
                                        class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Usuarios
                                            <?php use App\User; $users_count = User::all()->count(); ?>
                                            <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-item has-treeview">
                                    <a href="{{url('categorias')}}"
                                        class="{{ Request::path() === 'categorias' ? 'nav-link active' : 'nav-link' }}">
                                        <p>
                                            Categorias 
                                            <?php use App\Categorias; $categorias_count = Categorias::all()->count(); ?>
                                            <span class="right badge badge-danger">{{ $categorias_count ?? '0' }}</span>
                                        </p>
                                    </a>
                                </li>  

                                <li class="nav-item has-treeview">
                                    <a href="{{url('productos')}}"
                                        class="{{ Request::path() === 'productos' ? 'nav-link active' : 'nav-link' }}">
                                        <p>
                                            Productos
                                            <?php use App\Productos; $productos_count = Productos::all()->count(); ?>
                                            <span class="right badge badge-danger">{{ $productos_count ?? '0' }}</span> 
                                        </p>
                                    </a>
                                </li>  

                            </ul>
                        </nav>
                    </div>
                </aside>

    
                <div class="content-wrapper">

                    <div class="content-header">

                    </div>

                    <section class="content">
                        @yield('content')
                    </section>
                </div>
                
                <aside class="control-sidebar control-sidebar-dark">
                    
                </aside>
    
            </div>
        </div>
    </body>

    </html>