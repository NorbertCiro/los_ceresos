<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use App\Models\CostoAdicional;
use App\Models\Insumo;
use Illuminate\Console\View\Components\Component as ComponentsComponent;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component as ViewComponent;
use Livewire\Component;

use function App\View\Components\render;

class VerCultivoFaseModal extends Component
{
    public bool $abrirModal = false;
    public $cultivo_fase_id;

    public $keyInsumoSelected;
    public $insumoSelected;
    public $insumo;
    public $fasesCultivo;
    public $movimientosInsumos;

    public $keyActividadSelected;
    public $actividadSelected;
    public $actividad;
    public $movimientosActividad;





    public $costo;
    public $costosAdicionales;
    public $costoadicionals;


    public $cantidad = 0;
    public $valor = 0;




    public function mount()
    {
        $this->getInsumos();
        $this->getActividads();
        $this->getCostoAdicionals();
    }

    public function getInsumos()
    {
        $this->insumos = Insumo::all();
    }

    public function getActividads()
    {
        $this->actividades = Actividad::all();
    }

    public function getCostoAdicionals()
    {
        return view('livewire.agregar-costos-modal');
    }
    


    public function loadInsumos() {
        $this->movimientosInsumos =  DB::table('movimientos_insumos')
            ->select(
                'insumos.nombre as nombre_insumo',
                'movimientos_insumos.tipo as tipo_movimiento',
                'movimientos_insumos.cantidad as cantidad_movimientos_insumos',
                'insumos.precio as precio_insumo',
                'movimientos_insumos.created_at as fecha_movimiento',
            )
            ->where('cultivo_fase_id', $this->cultivo_fase_id)
            ->join('insumos', 'movimientos_insumos.insumo_id', '=', 'insumos.id')
            ->get();
    }

    public function loadActividad() {
        $this->movimientosActividad =  DB::table('movimientos_actividad')
            ->select(
                'actividads.nombre as nombre_actividad',
                'movimientos_actividad.cantidad as cantidad_movimiento',
                'movimientos_actividad.jornales as cantidad_jornales',
                'movimientos_actividad.valor as valor_movimiento',
                'movimientos_actividad.created_at as fecha_movimiento',
            )
            ->where('cultivo_fase_id', $this->cultivo_fase_id)
            ->join('actividads', 'movimientos_actividad.actividad_id', '=', 'actividads.id')
            ->get();
    }
    public function loadCosto() {
        $this->costoAdicionals =  DB::table('costo_adicionals')
            ->select(
                
                'costo_adicionals.fecha as fecha_costo',
                'costo_adicionals.precio as precio_costo',
                'costo_adicionals.descripcion as descripcion_costo',
            )
            ->where('cultivo_fase_id', $this->cultivo_fase_id)
            ->join('cultivos', 'costo_adicionals.fecha', '=', 'costo_adicionals.fecha')
            ->get();
    }

    public function render()
    {   $this->loadInsumos();
        $this->loadActividad();
        $this->loadCosto();
        return view('livewire.ver-cultivo-fase-modal');
    }



    public function show()
    {


        // $faseActividad = DB::table('fase_actividad')
        // ->where('cultivo_id', $cultivo->id)
        // ->get();


        return view('cultivos.ver');
    }
}
