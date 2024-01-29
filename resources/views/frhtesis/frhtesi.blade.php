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
                    <h2><b>Formación de Recursos Humanos</b></h2>
                </div>
                <form action="{{url('frhtesis')}}" method="post" enctype="multipart/form-data">
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
                            <label for="titulo_tesis" class="form-label">Titulo de Tesis</label>
                            <input type="text" class="form-control" name="titulo_tesis" placeholder="" value="{{old('titulo_tesis')}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="facultad" class="form-label">Facultad</label>
                            <input name="facultad" type="text" class="form-control shiny-bound-input" placeholder="" value="{{old('facultad')}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="escuela_profesional" class="form-label">Escuela Profesional</label>
                            <input name="escuela_profesional" type="text" class="form-control shiny-bound-input" placeholder="" value="{{old('escuela_profesional')}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="nivel_tesis" class="form-label">Nivel de Tesis</label>
                            <div>
                                <select class="form-select form-control" name="nivel_tesis" required>
                                    <option value="{{old('nivel_tesis')}}">Seleccione</option>
                                    <option>Pregrado</option>
                                    <option>Posgrado</option>
                                    <option>Maestria</option>
                                    <option>Doctorado</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="fecha_evaluacion" class="form-label">Fecha de evaluacion</label>
                            <div>
                                <input class="form-control" type="date" name="fecha_evaluacion" name="trip-start" value="{{old('fecha_evaluacion')}}" placeholder="" required>
                            </div>
                        </div>

                    </div>

                    <div class="w-100 my-4"></div>
                    <div class="form-group">
                        <label for="archivo_pdf"><h5><b>Adjuntar un archivo</b></h5></label>
                        <p class="help-block">Seleccione su actividad de de Productos de Investigación para su revisión. En extensión pdf.</p>
                        <input class="form-control" accept=".pdf" type="file" name="archivo_pdf" value="{{old('archivo_pdf')}}" required>
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
                    </div><br>
                </form>
            </div>
        </main>
    </div>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>

@endsection