<?php

namespace App\Http\Livewire;

use App\Models\Movimiento;
use App\Models\Insumo;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class TotalSalida extends Component
{
    public $insumos;
    public $insumoSeleccionado;
    public $tipo = "";
    public $cantidad;
    public $valor_total =0;
    public $fecha;



    public function mount($insumos)
    {
        $this->insumos = $insumos;
        
        
    }

    public function calculate()
    {

        $insumo = Insumo::find($this->insumoSeleccionado);
        $this->valor_total = $insumo->precio * $this->cantidad;
    }

    public function guardarMovimiento()
    {
        $movimiento = new Movimiento();
        $movimiento->insumo_id = $this->insumoSeleccionado;
        $movimiento->tipoMovimiento = $this->tipo;
        $movimiento->cantidad = $this->cantidad;
        $movimiento->valor = $this->valor_total;
        $movimiento->fecha = $this->fecha;
        $movimiento->save();
        return Redirect::route('movimientos.index');
    }

    public function render()
    {
        return view('livewire.total-salida');
    }
}
