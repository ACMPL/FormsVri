<?php

use App\Models\Piarticulo;
use App\Http\Controllers\PiarticuloController;
use App\Http\Controllers\PidocumentoController;
use App\Http\Controllers\FrhtesiController;
use App\Http\Controllers\FrhlibroController;
use App\Http\Controllers\GesiController;
use App\Http\Controllers\Pgi1Controller;
use App\Http\Controllers\Pgi2Controller;
use App\Http\Controllers\EvaliController;
use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatosExternosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('piarticulos/pdf',[PiarticuloController::class, 'pdf'])->name('piarticulos.pdf');
Route::get('pidocumentos/pdf',[PidocumentoController::class, 'pdf'])->name('pidocumentos.pdf');
Route::get('pgi2s/pdf',[Pgi2Controller::class, 'pdf'])->name('pgi2s.pdf');
Route::get('pgi1s/pdf',[Pgi1Controller::class, 'pdf'])->name('pgi1s.pdf');
Route::get('gesis/pdf',[GesiController::class, 'pdf'])->name('gesis.pdf');
Route::get('frhtesis/pdf',[FrhtesiController::class, 'pdf'])->name('frhtesis.pdf');
Route::get('frhlibros/pdf',[FrhlibroController::class, 'pdf'])->name('frhlibros.pdf');
Route::get('evalis/pdf',[EvaliController::class, 'pdf'])->name('evalis.pdf');

Route::get('/',function(){return view('main');});
Route::get('/category',function(){return view('category');});
Route::resource('/docentes', DocenteController::class);

Route::resource('/piarticulos', PiarticuloController::class);
Route::get('/piarticulos.piarticulo', [PiarticuloController::class, 'piarticulo'])->name('piarticulos.piarticulo');
Route::post('/piarticulos.piarticulo', [PiarticuloController::class, 'piarticulo'])->name('piarticulos.piarticulo');

Route::resource('/pidocumentos', PidocumentoController::class);
Route::get('/pidocumentos.pidocumento', [PidocumentoController::class, 'pidocumento'])->name('pidocumentos.pidocumento');
Route::post('/pidocumentos.pidocumento', [PidocumentoController::class, 'pidocumento'])->name('pidocumentos.pidocumento');

Route::resource('/frhtesis', FrhtesiController::class);
Route::get('/frhtesis.frhtesi', [FrhtesiController::class, 'frhtesi'])->name('frhtesis.frhtesi');
Route::post('/frhtesis.frhtesi', [FrhtesiController::class, 'frhtesi'])->name('frhtesis.frhtesi');

Route::resource('/frhlibros', FrhlibroController::class);
Route::get('/frhlibros.frhlibro', [FrhlibroController::class, 'frhlibro'])->name('frhlibros.frhlibro');
Route::post('/frhlibros.frhlibro', [FrhlibroController::class, 'frhlibro'])->name('frhlibros.frhlibro');

Route::resource('/gesis', GesiController::class);
Route::get('/gesis.gesi', [GesiController::class, 'gesi'])->name('gesis.gesi');
Route::post('/gesis.gesi', [GesiController::class, 'gesi'])->name('gesis.gesi');

Route::resource('/pgi1s', Pgi1Controller::class);
Route::get('/pgi1s.pgi1', [Pgi1Controller::class, 'pgi1'])->name('pgi1s.pgi1');
Route::post('/pgi1s.pgi1', [Pgi1Controller::class, 'pgi1'])->name('pgi1s.pgi1');

Route::resource('/pgi2s', Pgi2Controller::class);
Route::get('/pgi2s.pgi2', [Pgi2Controller::class, 'pgi2'])->name('pgi2s.pgi2');
Route::post('/pgi2s.pgi2', [Pgi2Controller::class, 'pgi2'])->name('pgi2s.pgi2');

Route::resource('/evalis', EvaliController::class);
Route::get('/evalis.evali', [EvaliController::class, 'evali'])->name('evalis.evali');
Route::post('/evalis.evali', [EvaliController::class, 'evali'])->name('evalis.evali');

Route::get('/mostrar-datos-externos', [DatosExternosController::class, 'mostrarDatosExternos'])
    ->name('mostrar-datos-externos');
