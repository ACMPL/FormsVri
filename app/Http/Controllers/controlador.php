<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Piarticulo;
use Illuminate\Http\Request;

class controlador extends Controller
{
    function index()
    {   
        return view('main');
    }
}
