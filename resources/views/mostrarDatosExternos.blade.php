mostrarDatosExternos.blade.php
@extends('layout/plantilla')
@section('tituloPagina','crud con laravel 8')
@section('contenido')

    <main>
        <div class="container py-4">
            <h1>Progresos</h1>  
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Docente</th>
                                    <th>Piarticulo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($piarticulos as $piarticulo)
                                <tr>
                                    <td>{{ $piarticulo->docentes->nombre }}</td>
                                    <td>
                                        @if ($piarticulo->completado)
                                            Completado
                                        @else
                                            Incompleto
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Docente</th>
                                    <th>Documento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pidocumentos as $pidocumento)
                                <tr>
                                    <td>{{ $pidocumento->docentes->nombre }}</td>
                                    <td>
                                        @if ($pidocumento->completado)
                                            Completado
                                        @else
                                            Incompleto
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Docente</th>
                                    <th>Tesis</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($frhtesis as $frhtesi)
                                <tr>
                                    <td>{{ $frhtesi->docentes->nombre }}</td>
                                    <td>
                                        @if ($frhtesi->completado)
                                            Completado
                                        @else
                                            Incompleto
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Docente</th>
                                    <th>Libro</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($frhlibros as $frhlibro)
                                <tr>
                                    <td>{{ $frhlibro->docentes->nombre }}</td>
                                    <td>
                                        @if ($frhlibro->completado)
                                            Completado
                                        @else
                                            Incompleto
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Docente</th>
                                    <th>Gestion Investigación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gesis as $gesi)
                                <tr>
                                    <td>{{ $gesi->docentes->nombre }}</td>
                                    <td>
                                        @if ($gesi->completado)
                                            Completado
                                        @else
                                            Incompleto
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Docente</th>
                                    <th>Proyectos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pgi1s as $pgi1)
                                <tr>
                                    <td>{{ $pgi1->docentes->nombre }}</td>
                                    <td>
                                        @if ($pgi1->completado)
                                            Completado
                                        @else
                                            Incompleto
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Docente</th>
                                    <th>Registro Investigación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pgi2s as $pgi2)
                                <tr>
                                    <td>{{ $pgi2->docentes->nombre }}</td>
                                    <td>
                                        @if ($pgi2->completado)
                                            Completado
                                        @else
                                            Incompleto
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Docente</th>
                                    <th>Evaluación Investigación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($evalis as $evali)
                                <tr>
                                    <td>{{ $evali->docentes->nombre }}</td>
                                    <td>
                                        @if ($evali->completado)
                                            Completado
                                        @else
                                            Incompleto
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection