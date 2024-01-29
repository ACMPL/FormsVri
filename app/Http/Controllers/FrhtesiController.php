<?php

namespace App\Http\Controllers;

use App\Models\Frhtesi;
use App\Models\Docente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FrhtesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frhtesis = Frhtesi::all();
        $docentes = Docente::all();
        return view('frhtesis.index', ['frhtesis'=> $frhtesis],['docentes' => $docentes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo_tesis' => 'required|max:300',
            'facultad' => 'required|max:200',
            'escuela_profesional' => 'required|max:200',
            'nivel_tesis' => 'required|max:100',
            'fecha_evaluacion' => 'required|date',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
            
        ]);

        $frhtesi = new Frhtesi();
        $frhtesi->titulo_tesis = $request->input('titulo_tesis');
        $frhtesi->facultad = $request->input('facultad');
        $frhtesi->escuela_profesional = $request->input('escuela_profesional');
        $frhtesi->nivel_tesis = $request->input('nivel_tesis');
        $frhtesi->fecha_evaluacion = $request->input('fecha_evaluacion');
        if ($request->hasFile('archivo_pdf')) {
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/frhtesis'), $pdfFileName);
            $frhtesi->archivo_pdf = $pdfFileName; // Almacena el nombre del archivo PDF en la base de datos
        }
        $frhtesi->completado = $request->has('completado');
        $idDocente = $request->input('docente');
        $docente = Docente::find($idDocente);

        // Asignar el autor al libro usando la relación definida
        $frhtesi->docentes()->associate($docente);
        $frhtesi->save();
        return view("frhtesis.message",['msg' => "La solicitud se envio correctamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Frhtesi $frhtesi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo_tesis' => 'required|max:300',
            'facultad' => 'required|max:200',
            'escuela_profesional' => 'required|max:200',
            'nivel_tesis' => 'required|max:100',
            'fecha_evaluacion' => 'required|date',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
        ]);

        $frhtesi = Frhtesi::find($id);
        $frhtesi->titulo_tesis = $request->input('titulo_tesis');
        $frhtesi->facultad = $request->input('facultad');
        $frhtesi->escuela_profesional = $request->input('escuela_profesional');
        $frhtesi->nivel_tesis = $request->input('nivel_tesis');
        $frhtesi->fecha_evaluacion = $request->input('fecha_evaluacion');
        if ($request->hasFile('archivo_pdf')) {
            // Elimina el PDF anterior si existe
            if ($frhtesi->archivo_pdf && file_exists(public_path('pdfs/frhtesis/' . $frhtesi->archivo_pdf))) {
                unlink(public_path('pdfs/frhtesis/' . $frhtesi->archivo_pdf));
            }
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/frhtesis'), $pdfFileName);
            $frhtesi->archivo_pdf = $pdfFileName; // Almacena el nombre actualizado del archivo PDF en la base de datos
        }
        $frhtesi->completado = $request->has('completado');
        $frhtesi->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frhtesi $frhtesi)
    {
        //
    }
    function frhtesi()
    {   
        $docentes = Docente::all();
        return view('frhtesis.frhtesi', ['docentes' => $docentes]);

    }
    public function pdf()
    {
        $frhtesis = Frhtesi :: all();
        $pdf = Pdf::loadView('frhtesis.pdf', compact('frhtesis'));
        return $pdf->stream();
    } 
}
