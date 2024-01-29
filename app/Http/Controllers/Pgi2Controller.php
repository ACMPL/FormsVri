<?php

namespace App\Http\Controllers;

use App\Models\Pgi2;
use App\Models\Docente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class Pgi2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pgi2s = Pgi2::all();
        $docentes = Docente::all();
        return view('pgi2s.index', ['pgi2s'=> $pgi2s],['docentes' => $docentes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:300',
            'grupo' => 'required|max:50',
            'nivel' => 'required|max:50',
            'vigencia_inicial' => 'required|date',
            'vigencia_final' => 'required|date',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
            
        ]);

        $pgi2 = new Pgi2();
        $pgi2->titulo = $request->input('titulo');
        $pgi2->grupo = $request->input('grupo');
        $pgi2->nivel = $request->input('nivel');
        $pgi2->vigencia_inicial = $request->input('vigencia_inicial');
        $pgi2->vigencia_final = $request->input('vigencia_final');
        if ($request->hasFile('archivo_pdf')) {
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/pgi2s'), $pdfFileName);
            $pgi2->archivo_pdf = $pdfFileName; // Almacena el nombre del archivo PDF en la base de datos
        }
        $pgi2->completado = $request->has('completado');
        $idDocente = $request->input('docente');
        $docente = Docente::find($idDocente);

        // Asignar el autor al libro usando la relación definida
        $pgi2->docentes()->associate($docente);
        $pgi2->save();
        return view("pgi2s.message",['msg' => "La solicitud se envio correctamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pgi2 $pgi2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:300',
            'grupo' => 'required|max:50',
            'nivel' => 'required|max:50',
            'vigencia_inicial' => 'required|date',
            'vigencia_final' => 'required|date',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
        ]);

        $pgi2 = Pgi2::find($id);
        $pgi2->titulo = $request->input('titulo');
        $pgi2->grupo = $request->input('grupo');
        $pgi2->nivel = $request->input('nivel');
        $pgi2->vigencia_inicial = $request->input('vigencia_inicial');
        $pgi2->vigencia_final = $request->input('vigencia_final');
        if ($request->hasFile('archivo_pdf')) {
            // Elimina el PDF anterior si existe
            if ($pgi2->archivo_pdf && file_exists(public_path('pdfs/piarticulos/' . $pgi2->archivo_pdf))) {
                unlink(public_path('pdfs/pgi2s/' . $pgi2->archivo_pdf));
            }
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/pgi2s'), $pdfFileName);
            $pgi2->archivo_pdf = $pdfFileName; // Almacena el nombre actualizado del archivo PDF en la base de datos
        }
        $pgi2->completado = $request->has('completado');
        $pgi2->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pgi2 $pgi2)
    {
        //
    }
    function pgi2()
    {   
        $docentes = Docente::all();
        return view('pgi2s.pgi2', ['docentes' => $docentes]);
    }
    public function pdf()
    {
        $pgi2s = Pgi2 :: all();
        $pdf = Pdf::loadView('pgi2s.pdf', compact('pgi2s'));
        return $pdf->stream();
    } 
}
