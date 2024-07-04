<?php

namespace App\Http\Controllers;

use App\Models\Cosecha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;


class CosechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cosechas= Cosecha::all();
        return view('cosechas.index', compact("cosechas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cosecha = new Cosecha();
        return view('cosechas.crear',compact('cosecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cosecha = new Cosecha();
        // $cosecha->id=$request->id;
        $cosecha->cultivo_id=$request->cultivo_id;
        $cosecha->fecha=$request->fecha;
        $cosecha->cantidad=$request->cantidad;
        $cosecha->user_id=$request->user_id;

        $cosecha->save();
        session()->flash("flash.banner","cosecha creado de manera satisfactoria");
        return Redirect::route('cosechas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cosecha  $Cosecha
     * @return \Illuminate\Http\Response
     */
    public function show(Cosecha $cosecha)
    {
        return view('cosechas.ver',compact('cosecha'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cosecha  $Cosecha
     * @return \Illuminate\Http\Response
     */
    public function edit(Cosecha $cosecha)
    {
        return view('cosechas.edit',compact("cosecha"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cosecha  $Cosecha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cosecha $cosecha)
    {
        $cosecha->cultivo_id=$request->cultivo_id;
        $cosecha->fecha=$request->fecha;
        $cosecha->cantidad=$request->cantidad;
        $cosecha->user_id=$request->user_id;
        $cosecha->save();
        session()->flash("flash.banner","cosecha modificada de manera satisfactoria");
        return Redirect::route('cosechas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cosecha  $Cosecha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cosecha $cosecha)
    {
        $cosecha->delete();
        return back()->with("flash.banner", "cosecha eliminada de manera exitosa");
    }

    public function downloadPDF()
    {
        $cosechas = Cosecha::all();
 
         $pdf = Pdf::loadView('cosechas.download', ['cosechas' => $cosechas]);
 
         return $pdf->stream();
    }
}
