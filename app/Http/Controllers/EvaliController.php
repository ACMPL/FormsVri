<?php

namespace App\Http\Controllers;

use App\Models\Evali;
use App\Models\Docente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EvaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evalis = evali::all();
        $docentes = Docente::all();
        return view('evalis.index', ['evalis'=> $evalis],['docentes' => $docentes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:300',
            'universidad' => 'required|max:200',
            'cantidad_autores' => 'required|max:11',
            'fecha' => 'required|date',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
            
        ]);

        $evali = new Evali();
        $evali->titulo = $request->input('titulo');
        $evali->universidad = $request->input('universidad');
        $evali->cantidad_autores = $request->input('cantidad_autores');
        $evali->fecha = $request->input('fecha');
        if ($request->hasFile('archivo_pdf')) {
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/evalis'), $pdfFileName);
            $evali->archivo_pdf = $pdfFileName; // Almacena el nombre del archivo PDF en la base de datos
        }
        $evali->completado = $request->has('completado');
        $idDocente = $request->input('docente');
        $docente = Docente::find($idDocente);

        // Asignar el autor al libro usando la relación definida
        $evali->docentes()->associate($docente);
        $evali->save();
        return view("evalis.message",['msg' => "La solicitud se envio correctamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evali $evali)
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
            'universidad' => 'required|max:200',
            'cantidad_autores' => 'required|max:11',
            'fecha' => 'required|date',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
        ]);

        $evali = Evali::find($id);
        $evali->titulo = $request->input('titulo');
        $evali->universidad = $request->input('universidad');
        $evali->cantidad_autores = $request->input('cantidad_autores');
        $evali->fecha = $request->input('fecha');
        if ($request->hasFile('archivo_pdf')) {
            // Elimina el PDF anterior si existe
            if ($evali->archivo_pdf && file_exists(public_path('pdfs/evalis/' . $evali->archivo_pdf))) {
                unlink(public_path('pdfs/evalis/' . $evali->archivo_pdf));
            }
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/evalis'), $pdfFileName);
            $evali->archivo_pdf = $pdfFileName; // Almacena el nombre actualizado del archivo PDF en la base de datos
        }
        $evali->completado = $request->has('completado');
        $evali->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evali $evali)
    {
        //
    }
    function evali()
    {   
        $docentes = Docente::all();
        return view('evalis.evali', ['docentes' => $docentes]);

    }
    public function pdf()
    {
        $evalis = Evali :: all();
        $pdf = Pdf::loadView('evalis.pdf', compact('evalis'));
        return $pdf->stream();
    } 
}
