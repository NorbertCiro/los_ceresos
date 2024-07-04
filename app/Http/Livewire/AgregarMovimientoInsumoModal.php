<?php

namespace App\Http\Livewire;

use App\Models\Insumo;
use FontLib\Autoloader;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class AgregarMovimientoInsumoModal extends Component
{

    public bool $abrirModal = false;
    public $fecha;
    public $observacion;

    public $insumos = null;
    public $keyInsumoSelected;
    public $insumoSelected;
    public $registro_movimientos;

    public $cantidad = 0;
    public bool $disableForm = true;
    public  $tipoMovimiento;
    public $precio = 0;

    public $movimientosActividad;
    public function mount()
    {
        $this->getInsumos();
    }

    public function getInsumos()
    {
        $this->insumos = Insumo::all();
    }

    public function onChangeInsumo()
    {
        if($this->keyInsumoSelected !== "") {
            $this->insumoSelected = $this->insumos[$this->keyInsumoSelected];
            if (!$this->tipoMovimiento) {
                $this->checkCantidad();
            }
        } else {
            $this->insumoSelected = null;
        }
    }

    public function updatePrice()
    {
        $this->precio = (int)$this->cantidad * (int)$this->insumoSelected->precio;
        $this->validateForm();
    }

    public function setTipoMovimiento($string)
    {
        $this->tipoMovimiento = $string;
        if (!$this->tipoMovimiento) {
            $this->checkCantidad();
            
        }
    }

    public function checkCantidad()
    {
        if ($this->cantidad > $this->insumoSelected->cantidad) {
            $this->cantidad = $this->insumoSelected->cantidad;
        }
    }

    public function validateForm() {
        if($this->tipoMovimiento == 'salida') {
            if ($this->cantidad > $this->insumoSelected->cantidad ||
                $this->cantidad == 0 ||
                $this->cantidad == null) {
                $this->disableForm = true;
            } else {
                $this->disableForm = false;
            }

        }
        else {
            if ($this->cantidad == 0 ||
                $this->cantidad == null) {
                $this->disableForm = true;
            } else {
                $this->disableForm = false;
            }
        }
    }

    public function getCantidadCalculada() {
        $cantidadCalculada = 0;
        if ($this->tipoMovimiento == 'entrada') {
            $cantidadCalculada = $this->insumoSelected->cantidad + $this->cantidad;
        }elseif ($this->tipoMovimiento == 'devolucion') {
            $cantidadCalculada = $this->insumoSelected->cantidad + $this->cantidad;
        } else {
            $cantidadCalculada = $this->insumoSelected->cantidad - $this->cantidad;
        }
        return $cantidadCalculada;
    }

    public function save()
    {
        // dd( $this->tipoMovimiento);
        
        DB::table('movimientos')->insert(
            [
                
                'insumo_id' => $this->insumoSelected->id,
                'insumo_nombre' => $this->insumoSelected->nombre,
                'fecha' => $this->fecha,
                'cantidad' => $this->cantidad,
                'insumo_precio' => $this->insumoSelected->precio,
                'precio' => $this->precio,
                'tipo' => $this->tipoMovimiento,
                'user_id' => Auth::user()->id,
                'observacion' => $this->observacion,
            ]
        );

        DB::table('insumos')
            ->where('id', $this->insumoSelected->id)
            ->update(
                ['cantidad' => $this->getCantidadCalculada()]
            );

       $this->resetForm();
       
    }

    public function resetForm() {
        $this->insumoSelected = null;
        $this->keyInsumoSelected = null;
        $this->abrirModal = false;
        $this->cantidad = 0;
        $this->tipoMovimiento;

        return redirect(request()->header('Referer'));
    }

    public function verMovimiento() {
        $this->movimientosActividad =  DB::table('registros_movimientos')
            ->select(
                'registros_movimientos.insumo_id as insumo_id_movimiento',
                'registros_movimientos.fecha as fecha_movimiento',
                'registros_movimientos.cantidad as cantidad_movimiento',
                'registros_movimientos.tipo as tipo_movimiento',
                'registros_movimientos.observacion as observacion_movimiento',
            )
            ->join('movimientos', 'registros_movimientos.movimiento_id', '=', 'movimientos.id')
            ->get();
    }
    public function render(){
        $this->loadMovimiento();
        return view('livewire.agregar-movimiento-insumo-modal');
    }
    public function index()
    {
        $this->loadMovimiento();
        return view('movimientos.index', compact('movimientos'));
    }
    public function loadMovimiento() {
        $this->movimientosActividad =  DB::table('movimientos')
            ->select(
                
                'movimientos.fecha as fecha_movimiento',
                'movimientos.cantidad as cantidad_movimiento',
                'movimientos.tipo as tipo_movimiento',
                'movimientos.observacion as observacion_movimiento',

            )
            // ->where('cultivo_fase_id', $this->cultivo_fase_id)
            ->join('cultivos', 'movimientos.fecha', '=', 'movimientos.fecha')
            ->get();
    }





    //     if ($this->tipo_movimiento == "salida") {
    //         if ($this->cantidad > $this->insumo->cantidad) {
    //             $this->msg = "La cantidad ingresada supera el inventario";
    //             return;
    //         }

    //         $cantidad_acutalizada = $this->insumo->cantidad - $this->cantidad;
    //     } else {
    //         $cantidad_acutalizada = $this->insumo->cantidad + $this->cantidad;
    //     }

    //     $this->insumo->cantidad = $cantidad_acutalizada;

    //     $this->insumo->update();

    //     $this->msg = "";



    //     $movement = new Insumo();
    //     $movement->cantidad = $this->cantidad;
    //     $movement->tipo = $this->tipo_movimiento;
    //     $movement->insumo_id = $this->insumo->id;
    //     $movement->precio = $this->precio_movimiento;

    //     $movement->save();

    //     $this->cantidad = 0;
    //     $this->precio_movimiento = 0;

    //     session()->flash('flash.banner', "Moviemientod e inventario registrado");

    //     $this->abrirModal = !$this->abrirModal;
    // }


    // public function save(){


    // //
    // //     $insumo = new Insumo();
    // //     $insumo->nombre = $this->nombre;
    // //     $insumo->unidad = $this->unidad;
    // //     $insumo->precio = $this->precio;
    // //     $insumo->cantidad = $this->cantidad;
    // //     $insumo->tipo = $this->tipo;
    // //     $insumo->fecha_vencimiento = $this->fecha_vencimiento;
    // //     $insumo->save();

    // //     $this->abrirModal = false;
    // }

    // public function updatePrice()
    // {

    // }
}
