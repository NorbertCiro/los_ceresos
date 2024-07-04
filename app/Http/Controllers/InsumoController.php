<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumo= Insumo::all();
        return view('insumos.index',compact("insumo"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumo = new Insumo();
        return view('insumos.crear' , compact('insumo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insumo = new Insumo();
        $insumo->codigo = $request->codigo;
        $insumo->nombre = $request->nombre;
        $insumo->unidad = $request->unidad;
        $insumo->cantidad = $request->cantidad;
        $insumo->precio = $request->precio;
        $insumo->tipo = $request->tipo;
        $insumo->fecha_vencimiento = $request->fecha_vencimiento;
        $insumo->save();
        session()->flash("flas.banner" , "Insumos creados de manera satisfactoria");
        return Redirect::route('insumos.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        return view('insumos.ver' , compact('insumo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        return view('insumos.edit', compact('insumo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumo $insumo)
    {
        $insumo->codigo = $request->codigo;
        $insumo->nombre = $request->nombre;
        $insumo->unidad = $request->unidad;
        $insumo->cantidad = $request->cantidad;
        $insumo->precio = $request->precio;
        $insumo->tipo = $request->tipo;
        $insumo->fecha_vencimiento = $request->fecha_vencimiento;
        $insumo->save();
        session()->flash("flas.banner" , "Insumos modificados de manera satisfactoria");
        return Redirect::route('insumos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumo $insumo)
    {
        $insumo->delete();
        session()->flash("flash.banner", "Insumo eliminado de manera satisfactoria");
        return Redirect::route('insumos.index');
    }

    public function downloadPDF()
    {
        $insumos = Insumo::all();

         $pdf = Pdf::loadView('insumos.download', ['insumos' => $insumos]);

         return $pdf->stream();
    }
}
