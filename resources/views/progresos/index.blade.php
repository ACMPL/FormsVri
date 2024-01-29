@extends('layout/plantilla')
@section('tituloPagina','crud con laravel 8')
@section('contenido')

<main>
    <div class="container py-4">
        <h1>Progresos</h1>
    </div>
    <div class="container">
        <table class="table table-hover table-responsive">
            <thead>
                <tr class="table-dark">
                    <th>Docente</th>
                    <th>Completado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($progresos as $progreso)
                <tr>
                    <td>{{ $progreso }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

@endsection