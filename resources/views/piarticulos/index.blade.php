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
        <h2 class="tituloA">Articulos</h2>
    </div>
    <div class="container py-1">
        <a href="{{route('piarticulos.pdf')}}" class="btn btn-custom" target="_blank">PDF <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
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
                        <th>Título del artículo</th>
                        <th>Clasificación</th>
                        <th>Cantidad de autores</th>
                        <th>Fecha de publicación</th>
                        <th>Enlace DOI</th>
                        <th>Enlace Journal</th>
                        <th>Archivo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($piarticulos as $piarticulo)
                    <tr>
                        <td>{{ $piarticulo->docentes->nombre}}</td>
                        <td>{{ $piarticulo->titulo_articulo }}</td>
                        <td>{{ $piarticulo->clasificacion }}</td>
                        <td>{{ $piarticulo->cantidad_autores }}</td>
                        <td>{{ $piarticulo->fecha_publicacion }}</td>
                        <td>{{ $piarticulo->enlace_DOI }}</td>
                        <td>{{ $piarticulo->enlace_Journal }}</td>
                        <td class="text-center">
                            @if ($piarticulo->archivo_pdf)
                            <a href="{{ asset('pdfs/piarticulos/' . $piarticulo->archivo_pdf) }}" target="_blank" class="btn btn-primary"><i class="bi bi-file-earmark-pdf"></i> PDF</a>
                            @else
                            <p>No hay PDF disponible.</p>
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
