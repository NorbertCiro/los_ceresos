<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AgregarCostosModal extends Component
{
    public bool $disableForm = false;
    public bool $abrirModal = false;
    public $cultivo_fase_id;
    public $cultivo_id;
    public $fecha;
    public $precio;
    public $descripcion;
    public $costos;
    public $costosAdicionales;

    // public function mount()
    // {
    //      $this->getCostos();
    // }

    public function render()
    {
        return view('livewire.agregar-costos-modal');
    }
    // public function getCostos()
    // {
    //     $this->costos = CostoAdicional::all();
    // }
    public function save()
    {
        $this->disableForm = false;
        DB::table('costo_adicionals')->insert(
            [
                'cultivo_fase_id' => $this->cultivo_fase_id,
                'fecha' => $this->fecha,
                'precio' => $this->precio,
                'descripcion' => $this->descripcion,
                'user_id' => Auth::user()->id,
            ]


        );
        $this->resetForm();
    }

    public function resetForm() {
        $this->fecha = null;
        $this->precio = 0;
        $this->descripcion = null;
    }

    public function verCosto() {
        $this->costosAdicionales =  DB::table('costo_adicionals')
            ->select(
                'costo_adicionals.fecha as fecha_movimiento',
                'costo_adicionals.precio as precio_costo',
                'costo_adicionals.observacion as observacion_costo',
            )
            ->join('costo', 'costo_adicionals.costo_id', '=', 'costos.id')
            ->get();
    }



    //otras maneras de guardar
    // public function insert(Request $request){
    //     $fecha = $request->input('fecha');
    //     $precio = $request->input('precio');
    //     $descripcion = $request->input('descripcion');
    //     $data=array('fecha'=>$fecha,"precio"=>$precio,"descripcion"=>$descripcion);
    //     DB::table('costo_adicionals')->insert($data);
    //     echo "Costo Adicional creado exitosamente.<br/>";
    //     }

    // public function store(Request $request , AgregarCostosModal $costo)
    // {
    //     // $costo->id=$request->id;
    //     $costo->fecha=$request->fecha;
    //     $costo->precio=$request->precio;
    //     $costo->descripcion=$request->descripcion;

    //     $costo->save();
    //     session()->flash("flash.banner","Costo creado de manera satisfactoria");
    //     return Redirect::route('costos.index');
    // }
}
