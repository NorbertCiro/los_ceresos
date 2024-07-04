<?php

namespace App\Http\Livewire;

use App\Models\Cultivo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;



class AgregarCosechaModal extends Component
{

    public bool $disableForm = false;
    public bool $abrirModal = false;
    public $cultivo_id;
    public $fecha;
    public $cantidad;
    public $cosecha;

    public function mount()
    {
        $this->getCultivo();
    }


    public function getCultivo()
    {
        $this->cultivos = $this->id;
    }



    public function render()
    {
     return view('livewire.agregar-cosecha-modal');
    }

    public function save()
    {
        $this->disableForm = false;

        DB::table('cosechas')->insert(
            [
                'cultivo_id' => $this->cultivo_id,
                'fecha' => $this->fecha,
                'cantidad' => $this->cantidad,
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
    // public function viewCosecha(){
    //     $this->cosecha = DB::table('_cosecha')
    //     ->select(
    //         '_cosecha.fecha as fecha',
    //         '_cosecha.cantidad as cantidad',
    //     )
    //     ->join('cosecha', '_cosecha.id', '=', 'cosecha.id')
    //     ->get();
    // }

}
