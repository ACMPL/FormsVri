<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $docentes = Docente::all();
        return view('docentes.index',['docentes'=> $docentes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',

        ]);

        $docente = new Docente();
        $docente->nombre = $request->input('nombre');
        $docente->apellido = $request->input('apellido');
        $docente->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Docente $autors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $docente = Docente::find($id);
        return view('docentes.edit', ['docente' => $docente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
        ]);

        $docente = Docente::find($id);
        $docente->nombre = $request->input('nombre');
        $docente->apellido = $request->input('apellido');
        
        $docente->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $docente = Docente::find($id);
        $docente->delete();
        return redirect("docentes");
    }

}
