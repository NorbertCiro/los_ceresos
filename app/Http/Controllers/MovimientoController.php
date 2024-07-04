<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos = Movimiento::all();
        $movimientosActividad = Movimiento::all();
        $insumos = Insumo::all();
        $insumo = new Insumo();
        return view('movimientos.index', compact('movimientos', 'insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $insumos = Insumo::all();
        return view('movimientos.create', compact('insumos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movimiento = new Movimiento();
        $insumo = new Insumo();
        $insumo = insumo::find($request->insumo);
        $movimiento->insumo_id = $request->insumo;
        $movimiento->insumo_nombre = $request->insumo;
        $movimiento->tipoMovimiento = $request->tipoMovimiento;
        $movimiento->cantidad = $request->cantidad;
        $movimiento->valor = $request->valor;
        $movimiento->fecha = $request->fecha;
        if($request->tipomovimiento == "entrada"){
            $insumo->cantidad = $insumo->cantidad + $request->cantidad;
        }elseif($request->tipomovimiento == "devolucion"){
            $insumo->cantidad = $insumo->cantidad + $request->cantidad;
        }else{
            $insumo->cantidad = $insumo->cantidad - $request->cantidad;
        }
        $movimiento->valor = $request->valor;
        //$valortotal= $request->precio*$request->cantidad;


        $insumo->save();

        $movimiento->save();
        session()->flash("flash.banner","Movimiento realizado con exito");
        return Redirect::route("movimientos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $movimiento)
    
    {
        $movimientos = Movimiento::all();
        $movimientosActividad = Movimiento::all();
        $insumos = Insumo::all();
        return view('movimientos.ver',compact('movimiento', 'insumos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimiento $movimiento)
    {
        $insumos = Insumo::all();
        return view ('movimientos.edit', compact('movimiento', 'insumos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        $movimiento->insumo_id = $request->insumo;
        $movimiento->tipoMovimiento = $request->tipoMovimiento;
        $movimiento->cantidad = $request->cantidad;
        $movimiento->valor = $request->valor;
        $movimiento->fecha = $request->fecha;

        $movimiento->save();
        session()->flash("flash.banner","Movimiento Moodificado Satisfatoriamente");
        return Redirect::route("movimientos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimiento $movimiento)
    {
        $movimiento->delete();
        return back()->with("flash.banner", "Movimiento eliminado de manera exitosa");
    }
    

    public function downloadPDF()
    {
        $movimientos = Movimiento::all();
 
         $pdf = Pdf::loadView('movimientos.download', ['movimientos' => $movimientos]);
 
         return $pdf->stream();
    }
    
}
