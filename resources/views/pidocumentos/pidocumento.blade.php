@extends('layout/plantilla')
@section('tituloPagina','crud')
@section('contenido')
<!-- Begin Page Content -->

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Checkout example · Bootstrap v5.3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/catalogo.css">
    <meta name="theme-color" content="#712cf9">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet">
</head>

<body class="bg-body-tertiary">

    <div class="container justify-content-center col-xl-10 col-lg-12 col-md-9">
        <main>
            @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            

            <div class="col-md-12 col-lg-12">
                <div class="py-3 text-left text-primary">
                    <h2><b>Productos de Investigación (Documento)</b></h2>
                </div>
                <br>
                <form action="{{url('pidocumentos')}}" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        @csrf
                        <div class="mb-2 row">
                            <label for="docente" class="col-sm-2 col-form-label">Docente:</label>
                            <div class="col-sm-7">
                                <select class="form-select" name="docente" id="docente" required>
                                    <option value="">Selecciona un autor</option>
                                    @foreach($docentes as $docente)
                                        <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="titulo_investigacion" class="form-label">Titulo de la investigación</label>
                            <input type="text" class="form-control" name="titulo_investigacion" placeholder="" value="{{old('titulo_investigacion')}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="cantidad_autores" class="form-label">Cantidad de autores</label>
                            <input name="cantidad_autores" type="number" class="form-control shiny-bound-input" placeholder="" value="{{old('cantidad_autores')}}" min="0" required>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_publicacion" class="form-label">Fecha de publicación</label>
                            <div>
                                <input class="form-control" type="date" name="fecha_publicacion" value="{{old('fecha_publicacion')}}" placeholder="" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="enlace_documento" class="form-label">Enlace del documento</label>
                            <input type="link" class="form-control" name="enlace_documento" placeholder="" value="{{old('enlace_documento')}}">
                        </div>

                    </div>

                    <div class="w-100 my-4"></div>
                    <div class="form-group">
                        <label for="archivo_pdf" class="col-sm-2 col-form-label"></label>
                            <h5><b>Adjuntar archivo </b></h5>
                        </label>
                        <input type="file" class="form-control" name="archivo_pdf" id="archivo_pdf" value="{{old('archivo_pdf')}}">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="completado" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Completado
                        </label>
                    </div>
                    <hr class="my-4">
                    <div class="text-right">
                        <button class="w-20 btn btn-primary btn-lg-3" type="submit" name="enviar">Enviar</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
        </main>
    </div>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>




@endsection