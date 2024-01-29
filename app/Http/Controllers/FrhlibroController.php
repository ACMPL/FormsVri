<?php

namespace App\Http\Controllers;

use App\Models\Frhlibro;
use App\Models\Docente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FrhlibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frhlibros = Frhlibro::all();
        $docentes = Docente::all();
        return view('frhlibros.index', ['frhlibros'=> $frhlibros],['docentes' => $docentes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo_libro' => 'required|max:300',
            'isbn' => 'required|max:50',
            'fecha_publicacion' => 'required|date',
            'enlace' => 'required|max:255',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
            
        ]);

        $frhlibro = new Frhlibro();
        $frhlibro->titulo_libro = $request->input('titulo_libro');
        $frhlibro->isbn = $request->input('isbn');
        $frhlibro->fecha_publicacion = $request->input('fecha_publicacion');
        $frhlibro->enlace = $request->input('enlace');
        if ($request->hasFile('archivo_pdf')) {
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/frhlibros'), $pdfFileName);
            $frhlibro->archivo_pdf = $pdfFileName; // Almacena el nombre del archivo PDF en la base de datos
        }
        $frhlibro->completado = $request->has('completado');
        $idDocente = $request->input('docente');
        $docente = Docente::find($idDocente);

        // Asignar el autor al libro usando la relación definida
        $frhlibro->docentes()->associate($docente);
        $frhlibro->save();
        return view("frhlibros.message",['msg' => "La solicitud se envio correctamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Frhlibro $frhlibro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo_libro' => 'required|max:300',
            'isbn' => 'required|max:50',
            'fecha_publicacion' => 'required|date',
            'enlace' => 'required|max:255',
            'archivo_pdf' => 'nullable|mimes:pdf|max:2048',
            'completado' => 'nullable|boolean', // Agrega esta regla de validación
            'docente' => 'required|max:255'
        ]);

        $frhlibro = Frhlibro::find($id);
        $frhlibro->titulo_libro = $request->input('titulo_libro');
        $frhlibro->isbn = $request->input('isbn');
        $frhlibro->fecha_publicacion = $request->input('fecha_publicacion');
        $frhlibro->enlace = $request->input('enlace');
        if ($request->hasFile('archivo_pdf')) {
            // Elimina el PDF anterior si existe
            if ($frhlibro->archivo_pdf && file_exists(public_path('pdfs/frhlibros/' . $frhlibro->archivo_pdf))) {
                unlink(public_path('pdfs/frhlibros/' . $frhlibro->archivo_pdf));
            }
            $pdfFile = $request->file('archivo_pdf');
            $pdfFileName = time() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move(public_path('pdfs/frhlibros'), $pdfFileName);
            $frhlibro->archivo_pdf = $pdfFileName; // Almacena el nombre actualizado del archivo PDF en la base de datos
        }
        $frhlibro->completado = $request->has('completado');
        $frhlibro->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frhlibro $frhlibro)
    {
        //
    }
    function frhlibro()
    {   
        $docentes = Docente::all();
        return view('frhlibros.frhlibro', ['docentes' => $docentes]);

    }
    public function pdf()
    {
        $frhlibros = Frhlibro :: all();
        $pdf = Pdf::loadView('frhlibros.pdf', compact('frhlibros'));
        return $pdf->stream();
    } 
}
