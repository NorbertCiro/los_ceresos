<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividads= Actividad::all();
        return view('actividads.index', compact("actividads"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividad = new Actividad();
        return view('actividads.crear',compact('actividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = new Actividad();

        $actividad->nombre  = $request->nombre;
        $actividad->estado  = $request->estado;
        $actividad->fecha_realizacion  = $request->fecha_realizacion;
        $actividad->valor  = $request->valor;
        $actividad->observacion  = $request->observacion;
        $actividad->save();
        session()->flash("flash.banner","Actividad creada la actividad de manera satisfactoria");
        return Redirect::route("actividads.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        return view('actividads.ver',compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividad)
    {
        return view('actividads.edit', compact("actividad"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad)
    {
        $actividad->nombre  = $request->nombre;
        $actividad->estado  = $request->estado;
        $actividad->fecha_realizacion  = $request->fecha_realizacion;
        $actividad->valor  = $request->valor;
        $actividad->observacion  = $request->observacion;
        $actividad->save();
        session()->flash("flash.banner","Actividad modificada de manera satisfactoria");
        return Redirect::route("actividads.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return back()->with("flash.banner", "Actividad eliminada de manera exitosa");
    }

    public function downloadPDF()
    {
        $actividads = Actividad::all();
 
         $pdf = Pdf::loadView('actividads.download', ['actividads' => $actividads]);
 
         return $pdf->stream();
    }
}
