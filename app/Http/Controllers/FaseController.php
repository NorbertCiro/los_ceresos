<?php

namespace App\Http\Controllers;

use App\Models\Fase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Barryvdh\DomPDF\Facade\Pdf;

class FaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fases= Fase::all();
        return view('fases.index', compact("fases"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("fases.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fase = new Fase();

        $fase->nombre = $request->nombre;

        $fase->save();

        session()->flash(
            'flash.banner',
            "Creado"
        );

        return Redirect::route("fases.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function show(Fase $fase)
    {
        return view('fases.ver',compact('fase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function edit(Fase $fase)
    {
        return view('fases.edit',compact("fase"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fase $fase)
    {
        $fase->nombre=$request->nombre;
        $fase->save();
        session()->flash("flash.banner","Fase modificada de manera satisfactoria");
        return Redirect::route('fases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fase  $fase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fase $fase)
    {
        $fase->delete();
        return back()->with("flash.banner", "Fase eliminada de manera exitosa");
    }

    public function downloadPDF()
    {
        $fases = Fase::all();
 
         $pdf = Pdf::loadView('fases.download', ['fases' => $fases]);
 
         return $pdf->stream();
    }

}
