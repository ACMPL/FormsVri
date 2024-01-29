@extends('layout/plantilla')
@section('tituloPagina','crud con laravel 8')
@section('contenido')
<style>
    .btn-custom {
        color: #fff; /* Color del texto en el botón */
        background-color: #6962c3; /* Color más claro de rojo */
        border-color: #6962c3; /* Color del borde del botón */
    }

    .btn-custom:hover {
        background-color: #4f48a7; /* Color más oscuro al pasar el ratón */
        border-color: #4f48a7; /* Color del borde al pasar el ratón */
    }

    .tituloA {
        color:#677598;
        font-family: 'Arial', sans-serif; /* Cambia 'Arial' al tipo de letra que prefieras */
        font-weight: bold; /* Hace el texto más grueso */
        /* font-weight: normal;  Cambia a normal para no hacerlo negrita */
        /*font-style: italic;  Hace el texto cursivo */
        font-size: 2em; /* Cambia el tamaño del texto, 1em es el tamaño normal del texto */
        margin-bottom: 1px;
    }
</style>

<main>
    <div class="container py-4">
        <h2 class="tituloA">Evaluación de la Investigación</h2>
    </div>
    <div class="container py-1">
        <a href="{{route('evalis.pdf')}}" class="btn btn-custom" target="_blank">PDF <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
            <path d="M5.523 10.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647c-.119.025-.237.05-.356.078a21.035 21.035 0 0 0 .5-1.05 11.96 11.96 0 0 0 .51.858c-.217.032-.436.07-.654.114m2.525.939a3.888 3.888 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 4.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
            <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.64 11.64 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.707 19.707 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
          </svg></a>  
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Docente</th>
                        <th>Titulo</th>
                        <th>universidad</th>
                        <th>Cantidad de Autores</th>
                        <th>Fecha de Publicacion</th>
                        <th>Archivo</th>
                        <th>Completado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evalis as $evali)
                    <tr>
                        <td>{{ $evali->docentes->nombre}}</td>
                        <td>{{ $evali->titulo }}</td>
                        <td>{{ $evali->universidad }}</td>
                        <td>{{ $evali->cantidad_autores }}</td>
                        <td>{{ $evali->fecha }}</td>
                        <td class="text-center">
                            <!-- Mostrar el enlace al PDF si está disponible -->
                            @if ($evali->archivo_pdf)
                                <a href="{{ asset('pdfs/evalis/' . $evali->archivo_pdf) }}" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                  </svg></a>
                            @else
                                <p>No hay PDF disponible.</p>
                            @endif
                        </td>
                        <td>
                            <!-- Mostrar el estado de "Completado" o "Incompleto" -->
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
    </main>

@endsection