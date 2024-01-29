<?php
namespace App\Http\Controllers;

use App\Models\Piarticulo;
use App\Models\Pidocumento;
use App\Models\Frhtesi;
use App\Models\Frhlibro;
use App\Models\Gesi;
use App\Models\Pgi1;
use App\Models\Pgi2;
use App\Models\Evali;
use Illuminate\Http\Request;

class DatosExternosController extends Controller
{
    public function mostrarDatosExternos() {
        $piarticulos = Piarticulo::with('docente')->get();
        $pidocumentos = Pidocumento::all();
        $frhtesis = Frhtesi::all();
        $frhlibros = Frhlibro::all();
        $gesis = Gesi::all();
        $pgi1s = Pgi1::all();
        $pgi2s = Pgi2::all();
        $evalis = Evali::all();

        return view('mostrarDatosExternos', compact('piarticulos', 'pidocumentos', 'frhtesis', 'frhlibros', 'gesis', 'pgi1s', 'pgi2s', 'evalis'));

    }
}