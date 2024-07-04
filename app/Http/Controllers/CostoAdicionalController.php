<?php

namespace App\Http\Controllers;

use App\Models\CostoAdicional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CostoAdicionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costos= CostoAdicional::all();
        return view('costos.index', compact("costos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costo = new CostoAdicional();
        return view('costos.crear',compact('costo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $costo = new CostoAdicional();
        // $costo->id=$request->id;
        $costo->fecha=$request->fecha;
        $costo->precio=$request->precio;
        $costo->descripcion=$request->descripcion;

        $costo->save();
        session()->flash("flash.banner","Costo creado de manera satisfactoria");
        return Redirect::route('costos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CostoAdicional  $costoAdicional
     * @return \Illuminate\Http\Response
     */
    public function show(CostoAdicional $costo)
    {
        return view('costos.ver',compact('costoAdicional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CostoAdicional  $costoAdicional
     * @return \Illuminate\Http\Response
     */
    public function edit(CostoAdicional $costo)
    {
        return view('costos.edit',compact("costo"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CostoAdicional  $costoAdicional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CostoAdicional $costo)
    {
        $costo->fecha=$request->fecha;
        $costo->precio=$request->precio;
        $costo->descripcion=$request->descripcion;
        $costo->save();
        session()->flash("flash.banner","Costo modificado de manera satisfactoria");
        return Redirect::route('costos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CostoAdicional  $costoAdicional
     * @return \Illuminate\Http\Response
     */
    public function destroy(CostoAdicional $costo)
    {
        $costo->delete();
        return back()->with("flash.banner", "Costo eliminado de manera exitosa");
    }
}
