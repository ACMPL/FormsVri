<?php

namespace App\Http\Controllers;

use App\Models\Pgi1;
use App\Models\Docente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class Pgi1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pgi1s = Pgi1::all();
        $docentes = Docente::all();
        return view('pgi1s.index', ['pgi1s'=> $pgi1s],['docentes' => $docentes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:300',
            'grupo' => 'required|max:300',
            'rol' => 'required|max:100',
            'participantes' => 'required|max:11',
            'fecha' => 'required|date',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
            
        ]);
        $pgi1 = new Pgi1();
        $pgi1->titulo = $request->input('titulo');
        $pgi1->grupo = $request->input('grupo');
        $pgi1->rol = $request->input('rol');
        $pgi1->participantes = $request->input('participantes');
        $pgi1->fecha = $request->input('fecha');
        if ($request->hasFile('archivo_pdf')) {
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/pgi1s'), $pdfFileName);
            $pgi1->archivo_pdf = $pdfFileName; // Almacena el nombre del archivo PDF en la base de datos
        }
        $pgi1->completado = $request->has('completado');
        $idDocente = $request->input('docente');
        $docente = Docente::find($idDocente);

        // Asignar el autor al libro usando la relación definida
        $pgi1->docentes()->associate($docente);
        $pgi1->save();
        return view("pgi1s.message",['msg' => "La solicitud se envio correctamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pgi1 $pgi1)
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
            'grupo' => 'required|max:300',
            'rol' => 'required|max:100',
            'participantes' => 'required|max:11',
            'fecha' => 'required|date',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
        ]);

        $pgi1 = Pgi1::find($id);
        $pgi1->titulo = $request->input('titulo');
        $pgi1->grupo = $request->input('grupo');
        $pgi1->rol = $request->input('rol');
        $pgi1->participantes = $request->input('participantes');
        $pgi1->fecha = $request->input('fecha');
        if ($request->hasFile('archivo_pdf')) {
            // Elimina el PDF anterior si existe
            if ($pgi1->archivo_pdf && file_exists(public_path('pdfs/pgi1s/' . $pgi1->archivo_pdf))) {
                unlink(public_path('pdfs/pgi1s/' . $pgi1->archivo_pdf));
            }
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/pgi1s'), $pdfFileName);
            $pgi1->archivo_pdf = $pdfFileName; // Almacena el nombre actualizado del archivo PDF en la base de datos
        }
        $pgi1->completado = $request->has('completado');
        $pgi1->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pgi1 $pgi1)
    {
        //
    }
    function pgi1()
    {   
        $docentes = Docente::all();
        return view('pgi1s.pgi1', ['docentes' => $docentes]);

    }
    public function pdf()
    {
        $pgi1s = Pgi1 :: all();
        $pdf = Pdf::loadView('pgi1s.pdf', compact('pgi1s'));
        return $pdf->stream();
    } 
}
