<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Punto Venta</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    @stack('css')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #36414c;
            color: #adb5bd;
            position: fixed;
            height: 100%;
            width: 250px;
            padding-top: 20px;
        }

        .sidebar a {
            color: #adb5bd;
        }

        .sidebar a:hover {
            color: #ffffff;
        }

        main {
            margin-left: 250px;
            padding: 15px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Navbar Lateral -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fas fa-home"></i> Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registroventa') }}">
                                <i class="fas fa-shopping-cart"></i> Registro Venta
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.vista') }}">
                                <i class="fas fa-eye"></i> Vista de Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Agregar.Eliminar') }}">
                                <i class="fas fa-plus"></i> Agregar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fas fa-users"></i> Usuario
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt"></i> Cerrar Sesion
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- Contenido Principal -->
            @yield('main-content')
        </div>
    </div>

    <footer class="text-center py-3 fixed-bottom">
        <span>Edited by - Alonso Cuevas & Jeremy Ormeño - <span class="far fa-copyright"></span>
            2023 All
            rights reserved.</span>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    @stack('js')
</body>

</html>
