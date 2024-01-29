<?php

namespace App\Http\Controllers;

use App\Models\Pidocumento;
use App\Models\Docente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PidocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pidocumentos = Pidocumento::all();
        $docentes = Docente::all();
        return view('pidocumentos.index', ['pidocumentos'=> $pidocumentos],['docentes' => $docentes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo_investigacion' => 'required|max:300',
            'cantidad_autores' => 'required|max:11',
            'fecha_publicacion' => 'required|date',
            'enlace_documento' => 'required|max:255',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
            
        ]);

        $pidocumento = new Pidocumento();
        $pidocumento->titulo_investigacion = $request->input('titulo_investigacion');
        $pidocumento->cantidad_autores = $request->input('cantidad_autores');
        $pidocumento->fecha_publicacion = $request->input('fecha_publicacion');
        $pidocumento->enlace_documento = $request->input('enlace_documento');
        if ($request->hasFile('archivo_pdf')) {
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/pidocumentos'), $pdfFileName);
            $pidocumento->archivo_pdf = $pdfFileName; // Almacena el nombre del archivo PDF en la base de datos
        }
        $pidocumento->completado = $request->has('completado');
        $idDocente = $request->input('docente');
        $docente = Docente::find($idDocente);

        // Asignar el autor al libro usando la relación definida
        $pidocumento->docentes()->associate($docente);
        $pidocumento->save();
        return view("pidocumentos.message",['msg' => "La solicitud se envio correctamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pidocumento $pidocumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo_investigacion' => 'required|max:300',
            'cantidad_autores' => 'required|max:11',
            'fecha_publicacion' => 'required|date',
            'enlace_documento' => 'required|max:255',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
            
        ]);
        $pidocumento = Pidocumento::find($id);
        $pidocumento->titulo_investigacion = $request->input('titulo_investigacion');
        $pidocumento->cantidad_autores = $request->input('cantidad_autores');
        $pidocumento->fecha_publicacion = $request->input('fecha_publicacion');
        $pidocumento->enlace_documento = $request->input('enlace_documento');
        if ($request->hasFile('archivo_pdf')) {
            // Elimina el PDF anterior si existe
            if ($pidocumento->archivo_pdf && file_exists(public_path('pdfs/pidocumentos/' . $pidocumento->archivo_pdf))) {
                unlink(public_path('pdfs/pidocumentos/' . $pidocumento->archivo_pdf));
            }
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/pidocumentos'), $pdfFileName);
            $pidocumento->archivo_pdf = $pdfFileName; // Almacena el nombre actualizado del archivo PDF en la base de datos
        }
        $pidocumento->completado = $request->has('completado');
        $pidocumento->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pidocumento $pidocumento)
    {
        //
    }
    function pidocumento()
    {   
        $docentes = Docente::all();
        return view('pidocumentos.pidocumento', ['docentes' => $docentes]);

    }
    public function pdf()
    {
        $pidocumentos = Pidocumento :: all();
        $pdf = Pdf::loadView('pidocumentos.pdf', compact('pidocumentos'));
        return $pdf->stream();
    } 
}
