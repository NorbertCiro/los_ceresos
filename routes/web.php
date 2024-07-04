<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\CostoAdicionalController;
use App\Http\Controllers\CosechaController;
use App\Http\Controllers\CultivoController;
use App\Http\Controllers\FaseController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\AgregarCostosModal;
use App\Actions\Fortify\CreateNewUser;

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("welcome");
})->name('home');

Route::middleware([
    "auth:sanctum",
    config("jetstream.auth_session"),
    "verified"
])->group(function () {
    Route::get("/dashboard", function () {
        return view("dashboard");
    })->name("dashboard");

  
    Route::resource('/users', UserController::class)->middleware('can:users.index');

    Route::resource("/cultivos", CultivoController::class)->middleware('can:cultivos index');
    
    Route::put("/cultivos/updateCultivo/{cultivo}", [CultivoController::class, "updateCultivo"])->name("cultivos.updateCultivo")->middleware('can:cultivos index');
   

    Route::get("/cultivos/extras/{cultivo}", [CultivoController::class, 'extras'])->name("cultivos.extras")->middleware('can:cultivos index');
    Route::resource("/fases", FaseController::class)->middleware('can:Inicio fases');
    Route::resource("/costos", CostoAdicionalController::class)->middleware('can:Inicio costos');
    Route::resource("/cosechas", CosechaController::class);

    Route::resource("/actividades", ActividadController::class)->middleware('can:Inicio actividades');
    Route::resource("/insumos", InsumoController::class)->middleware('can:Inicio insumos');
    Route::resource("/movimientos", MovimientoController::class)->middleware('can:Inicio movimientos');

    Route::resource("/actividads", ActividadController::class)->middleware('can:Inicio actividades');
    Route::resource("/insumos", InsumoController::class)->middleware('can:Inicio insumos');
    Route::post("/destroy_cultivo_fase", [CultivoController::class, 'destroyCultivoFase'])->name("destroyCultivoFase")->middleware('can:cultivos index');
    // Route::get("/editar", [CultivoController::class, 'cultivos.editar'])->name("editar");
    Route::resource("/livewire", AgregarCostosModal::class)->middleware('can:Inicio costos');

    //reportes
    Route::get("/cultivos/reporte/{cultivo}", [CultivoController::class, "reporte"])->name("cultivos.reporte")->middleware('can:cultivos index');
    Route::get('download-pdf', [CultivoController::class, 'downloadPDF'])->name('download-pdf');

    Route::get('download-pdf-insumos', [InsumoController::class, 'downloadPDF'])->name('download-pdf-insumos');

    Route::get('download-pdf-actividads', [ActividadController::class, 'downloadPDF'])->name('download-pdf-actividads');

    Route::get('download-pdf-fases', [FaseController::class, 'downloadPDF'])->name('download-pdf-fases');

    Route::get('download-pdf-movimientos', [MovimientoController::class, 'downloadPDF'])->name('download-pdf-movimientos');

    Route::get('download-pdf-cosechas', [CosechaController::class, 'downloadPDF'])->name('download-pdf-cosechas');

});
