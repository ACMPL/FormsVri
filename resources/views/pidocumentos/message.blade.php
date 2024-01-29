@extends('layout/plantilla')
@section('tituloPagina','crud con laravel 8')
@section('contenido')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<main>
    <div>
        <div class="alert alert-secondary" role="alert">
        
            <div class="signin">
                <span>{{ $msg }} / <a  class="text-uppercase text-reset  fw-bold mb-4" style="text-decoration: none;" href="{{ url('pidocumentos.pidocumento') }}">Ok</a></span>
            </div>     
        </div>
        <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-2" style="width: 40rem;" src="img/inicio.png" alt="">
        </div>
        <br>
    </div>
    <br><br><br>  
</main>
@endsection