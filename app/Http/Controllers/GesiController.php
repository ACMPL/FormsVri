<?php

namespace App\Http\Controllers;

use App\Models\Gesi;
use App\Models\Docente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gesis = Gesi::all();
        $docentes = Docente::all();
        return view('gesis.index', ['gesis'=> $gesis],['docentes' => $docentes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_doc' => 'required|max:50',
            'titulo' => 'required|max:300',
            'universidad' => 'required|max:200',
            'fecha_publicacion' => 'required|date',
            'descripcion' => 'required|max:300',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
            
        ]);

        $gesi = new Gesi();
        $gesi->tipo_doc = $request->input('tipo_doc');
        $gesi->titulo = $request->input('titulo');
        $gesi->universidad = $request->input('universidad');
        $gesi->fecha_publicacion = $request->input('fecha_publicacion');
        $gesi->descripcion = $request->input('descripcion');
        if ($request->hasFile('archivo_pdf')) {
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/gesis'), $pdfFileName);
            $gesi->archivo_pdf = $pdfFileName; // Almacena el nombre del archivo PDF en la base de datos
        }
        $gesi->completado = $request->has('completado');
        $idDocente = $request->input('docente');
        $docente = Docente::find($idDocente);

        // Asignar el autor al libro usando la relación definida
        $gesi->docentes()->associate($docente);
        $gesi->save();
        return view("gesis.message",['msg' => "La solicitud se envio correctamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gesi $gesi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_doc' => 'required|max:50',
            'titulo' => 'required|max:300',
            'universidad' => 'required|max:200',
            'fecha_publicacion' => 'required|date',
            'descripcion' => 'required|max:300',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
        ]);

        $gesi = Gesi::find($id);
        $gesi->tipo_doc = $request->input('tipo_doc');
        $gesi->titulo = $request->input('titulo');
        $gesi->universidad = $request->input('universidad');
        $gesi->fecha_publicacion = $request->input('fecha_publicacion');
        $gesi->descripcion = $request->input('descripcion');
        if ($request->hasFile('archivo_pdf')) {
            // Elimina el PDF anterior si existe
            if ($gesi->archivo_pdf && file_exists(public_path('pdfs/gesis/' . $gesi->archivo_pdf))) {
                unlink(public_path('pdfs/gesis/' . $gesi->archivo_pdf));
            }
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/gesis'), $pdfFileName);
            $gesi->archivo_pdf = $pdfFileName; // Almacena el nombre actualizado del archivo PDF en la base de datos
        }
        $gesi->completado = $request->has('completado');
        $gesi->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gesi $gesi)
    {
        //
    }
    function gesi()
    {   
        $docentes = Docente::all();
        return view('gesis.gesi', ['docentes' => $docentes]);

    }
    public function pdf()
    {
        $gesis = Gesi :: all();
        $pdf = Pdf::loadView('gesis.pdf', compact('gesis'));
        return $pdf->stream();
    } 
}
