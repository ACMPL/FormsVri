<?php

namespace App\Http\Controllers;

use App\Models\Piarticulo;
use App\Models\Docente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PiarticuloController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     */
    public function index()
    {
        $piarticulos = Piarticulo::all();
        $docentes = Docente::all();
        return view('piarticulos.index', ['piarticulos'=> $piarticulos],['docentes' => $docentes]);
    }

    /**
     * Almacene un recurso recién creado en el almacenamiento.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo_articulo' => 'required|max:300',
            'clasificacion' => 'required|max:50',
            'cantidad_autores' => 'required|max:11',
            'fecha_publicacion' => 'required|date',
            'enlace_DOI' => 'required|max:255',
            'enlace_Journal' => 'required|max:255',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
            
        ]);

        $piarticulo = new Piarticulo();
        $piarticulo->titulo_articulo = $request->input('titulo_articulo');
        $piarticulo->clasificacion = $request->input('clasificacion');
        $piarticulo->cantidad_autores = $request->input('cantidad_autores');
        $piarticulo->fecha_publicacion = $request->input('fecha_publicacion');
        $piarticulo->enlace_DOI = $request->input('enlace_DOI');
        $piarticulo->enlace_Journal = $request->input('enlace_Journal');
        if ($request->hasFile('archivo_pdf')) {
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/piarticulos'), $pdfFileName);
            $piarticulo->archivo_pdf = $pdfFileName; // Almacena el nombre del archivo PDF en la base de datos
        }
        $piarticulo->completado = $request->has('completado');
        $idDocente = $request->input('docente');
        $docente = Docente::find($idDocente);

        // Asignar el docente al articulo usando la relación definida
        $piarticulo->docentes()->associate($docente);
        $piarticulo->save();
        return view("piarticulos.message",['msg' => "La solicitud se envio correctamente"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Piarticulo $piarticulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo_articulo' => 'required|max:300',
            'clasificacion' => 'required|max:50',
            'cantidad_autores' => 'required|max:11',
            'fecha_publicacion' => 'required|date',
            'enlace_DOI' => 'required|max:255',
            'enlace_Journal' => 'required|max:255',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación 
            'docente' => 'required|max:255'
        ]);

        $piarticulo = Piarticulo::find($id);
        $piarticulo->titulo_articulo = $request->input('titulo_articulo');
        $piarticulo->clasificacion = $request->input('clasificacion');
        $piarticulo->cantidad_autores = $request->input('cantidad_autores');
        $piarticulo->fecha_publicacion = $request->input('fecha_publicacion');
        $piarticulo->enlace_DOI = $request->input('enlace_DOI');
        $piarticulo->enlace_Journal = $request->input('enlace_Journal');
        if ($request->hasFile('archivo_pdf')) {
            // Elimina el PDF anterior si existe
            if ($piarticulo->archivo_pdf && file_exists(public_path('pdfs/piarticulos/' . $piarticulo->archivo_pdf))) {
                unlink(public_path('pdfs/piarticulos/' . $piarticulo->archivo_pdf));
            }
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/piarticulos'), $pdfFileName);
            $piarticulo->archivo_pdf = $pdfFileName; // Almacena el nombre actualizado del archivo PDF en la base de datos
        }
        $piarticulo->completado = $request->has('completado');
        $piarticulo->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Piarticulo $piarticulo)
    {
        //
    }
    function piarticulo()
    {   
        $docentes = Docente::all();
        return view('piarticulos.piarticulo', ['docentes' => $docentes]);

    }
    public function pdf()
    {
        $piarticulos = Piarticulo :: all();
        $pdf = Pdf::loadView('piarticulos.pdf', compact('piarticulos'));
        return $pdf->stream();
    } 

}
