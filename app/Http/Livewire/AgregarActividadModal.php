<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AgregarActividadModal extends Component
{

    public bool $abrirModal = false;
    public $cultivo_fase_id;

    public $cultivo = null;
    public $actividads = null;
    public $keyActividadSelected;
    public $actividadSelected;

    public $cantidad = 0;
    public $cantidadMaxima = 10;
    public bool $disableForm = false;  //para la validacion del boton debe se true
    public bool $tipoMovimiento = true;
    public $valor = 0;
    public $jornales = 0;




    public function mount()
    {
        $this->getActividads();
    }

    public function render()
    {
        return view('livewire.agregar-actividad-modal');
    }

    public function getActividads()
    {
        $this->actividads = Actividad::all();
    }

    public function onChangeActividad()
    {
        $this->actividadSelected = $this->actividads[$this->keyActividadSelected];
        if (!$this->tipoMovimiento) {
            $this->checkCantidad();
        }
    }

    public function updatePrice()
    {
        $this->valor = (int)$this->cantidad * (int)$this->actividadSelected->valor;
        $this->jornales = (int)$this->cantidad / 8;
    }


    public function setTipoMovimiento($bool)
    {
        $this->tipoMovimiento = $bool;
        if (!$this->tipoMovimiento) {
            $this->checkCantidad();
        }
    }

    public function checkCantidad()
    {
        if ($this->cantidad > $this->actividadSelected->cantidad) {
            $this->cantidad = $this->actividadSelected->cantidad;
        }
    }



    public function save()
    {
        $this->disableForm = false;
        DB::table('movimientos_actividad')->insert(
            [
                'cultivo_fase_id' => $this->cultivo_fase_id,
                'actividad_id' => $this->actividadSelected->id,
                'cantidad' => $this->cantidad,
                'jornales' => $this->jornales,
                'valor' => $this->valor,
                'user_id' => Auth::user()->id
            ]
        );

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->actividadSelected = null;
        $this->keyActividadSelected = null;
        $this->abrirModal = false;
        $this->cantidad = 0;
        $this->disableForm = false;
    }
}
