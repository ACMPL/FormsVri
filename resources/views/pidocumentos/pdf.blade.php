<style>
    .cabecera {
        background-color: #535a90; /* Color de fondo de la cabecera */
        color: white; /* Color del texto en la cabecera */
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px; /* Espacio superior entre el título y la tabla */
    }

    .table th, .table td {
        border: 2px solid #000000; /* Color del borde de las celdas */
        padding: 10px; /* Espaciado interno de las celdas */
    }

    .table th {
        text-align: center;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9; /* Color de fondo de las filas pares */
    }

    .titulo {
        text-align: center;
        margin-bottom: 25px; /* Espacio inferior entre el título y la tabla */
    }
</style>
<h1 class="titulo">Reporte Documentos</h1>
<table class="table" style="text-align:center; font-size:20px;">
    <thead class="cabecera">
        <tr>
            <th>Docente</th>
            <th>Título del Documento</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pidocumentos as $pidocumento)
        <tr>
            <td>{{ $pidocumento->docentes->nombre }}</td>
            <td>{{ $pidocumento->titulo_investigacion }}</td>
            <td>
                <!-- Mostrar el estado de "Completado" o "Incompleto" -->
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