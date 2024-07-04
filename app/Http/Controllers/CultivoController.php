<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Cultivo;
use App\Models\Fase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;


class CultivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(get_class_methods('App\Http\Controllers\CultivoController'));
        return view("cultivos.index", ["cultivos" => Cultivo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cultivos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cultivo = new Cultivo();

        $cultivo->nombre  = $request->nombre;
        $cultivo->fecha_inicio  = $request->fecha_inicio;
        $cultivo->fecha_cosecha  = $request->fecha_cosecha;
        $cultivo->area_terreno  = $request->area_terreno;
        $cultivo->densidad  = $request->densidad;
        $cultivo->plantas_area = $request->plantas_area;
        $cultivo->tipo  = $request->tipo;
        $cultivo->save();

        // $fase = new Fase();

        // $fase->nombre  = $request->nombre;
        // $fase->save();

        // $cultivo->fases()->attach($fase);

        session()->flash(
            'flash.banner',
            "Creado"
        );

        return Redirect::route("cultivos.edit", $cultivo);

        // return Redirect::route("cultivos.edit");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo  $cultivo
     * @return \Illuminate\Http\Response
     */
    public function show(Cultivo $cultivo)
    {
        $cosechas =  DB::table('cosechas')
        ->where('cultivo_id', $cultivo->id)
        // ->select('cultivos.nombre as nombre_cultivo','fases.nombre as nombre_fase', 'fases.*')
        ->select('fecha', 'cantidad')
        ->get();

        $fasesCultivo =  DB::table('cultivo_fase')
            ->where('cultivo_id', $cultivo->id)
            // ->select('cultivos.nombre as nombre_cultivo','fases.nombre as nombre_fase', 'fases.*')
            ->select('fases.nombre as nombre_fase', 'cultivo_fase.created_at')
            ->join('cultivos', 'cultivo_fase.cultivo_id', '=', 'cultivos.id')
            ->join('fases', 'cultivo_fase.fase_id', '=', 'fases.id')
            ->get();

        // $faseActividad = DB::table('fase_actividad')
        // ->where('cultivo_id', $cultivo->id)
        // ->get();


        return view('cultivos.ver', [
            'cultivo' => $cultivo,
            'fasesCultivo' => $fasesCultivo,
            'cosechas' => $cosechas,
            // 'fasesActividad' => $fasesActividad
        ]);
    }

    public function showCultivo(Cultivo $cultivo)
    {
        return view('cultivos.vercultivo', compact('cultivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo  $cultivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cultivo $cultivo)
    {
        return view('cultivos.edit', compact("cultivo"));
    }

    public function extras(Cultivo $cultivo)
    {
        $cultivoFases =  DB::table('cultivo_fase')
            ->select('cultivo_fase.id as cultivo_fase_id', 'fases.nombre', 'cultivo_fase.cultivo_id')
            ->where('cultivo_id', $cultivo->id)
            ->join('fases', 'cultivo_fase.fase_id', '=', 'fases.id')
            ->get();


        return view("cultivos.extras", [
            "cultivo" => $cultivo,
            "cultivo_fases" => $cultivoFases,
            "actividad" => Actividad::all(),
            "fases" => Fase::all()
            // "insumo" => Insumo::all()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo  $cultivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cultivo $cultivo)
    {
        $faseExists =  DB::table('cultivo_fase')
            ->where('fase_id', $request->fase)
            ->where('cultivo_id', $cultivo->id)
            ->get();

        // dd($faseExists);
        // echo count($faseExists);
        if (count($faseExists) <= 0) {
            $fase = Fase::findOrFail($request->fase);
            $cultivo->fases()->attach($fase);
        } else {
            session()->flash("flash.banner", "No se puede agregar fase por que esta ya se encuentra creada");
        }
        // die;

        return Redirect::route("cultivos.extras", $cultivo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo  $cultivo
     * @return \Illuminate\Http\Response
     */

    public function destroy(Cultivo $cultivo)
    {
        $cultivo->delete();
        return back()->with("flash.banner", "Cultivo eliminado de manera exitosa");
    }


    public function destroyCultivoFase(Request $request)
    {
        $cultivo_fase_id = json_decode($request->cultivo_fase_id);
        $cultivo_id = json_decode($request->cultivo_id);
        DB::table('cultivo_fase')->where('id', $cultivo_fase_id)->delete();
        return Redirect::route("cultivos.extras", $cultivo_id);
    }

    public function reporte(Cultivo $cultivo)
    {
        $fases =  DB::table('cultivo_fase')
            ->select('cultivo_fase.id as cultivo_fase_id', 'fases.nombre', 'cultivo_fase.cultivo_id')
            ->where('cultivo_id', $cultivo->id)
            ->join('fases', 'cultivo_fase.fase_id', '=', 'fases.id')
            ->get();
        $pdf = pdf::loadview('cultivos.reporte', compact("cultivo", "fases"));
        return $pdf->stream();
    }

    public function downloadPDF()
    {
        $cultivos = Cultivo::all();
         $pdf = Pdf::loadView('cultivos.download', ['cultivos' => $cultivos]);
         return $pdf->stream();
    }


    public function updateCultivo(Request $request, Cultivo $cultivo)
    {
        $cultivo->nombre  = $request->nombre;
        $cultivo->fecha_inicio  = $request->fecha_inicio;
        $cultivo->fecha_cosecha  = $request->fecha_cosecha;
        $cultivo->area_terreno  = $request->area_terreno;
        $cultivo->densidad  = $request->densidad;
        $cultivo->plantas_area = $request->plantas_area;
        $cultivo->tipo  = $request->tipo;
        $cultivo->save();
        session()->flash("flash.banner","Cultivo modificado de manera satisfactoria");
        return Redirect::route("cultivos.index");
    }
}
