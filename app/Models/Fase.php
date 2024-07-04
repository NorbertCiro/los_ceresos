<?php

namespace App\Models;

use App\Http\Livewire\AgregarCostosModal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    use HasFactory;

    /**
     * Trae el cultivo al que pertenece esta fase.
     */
    public function cultivos()
    {
        return $this->belongsToMany(Cultivo::class);
    }

    /**
     * Trae la actividad al que pertenece esta fase.
     */
    public function actividades()
    {
        return $this->belongsToMany(Actividad::class);
    }

    /**
     * Trae el costo adicional asociado esta fase.
     */
    public function costoAdicional()
    {
        return $this->belongsToMany(CostoAdicional::class);
    }

    public function agregarCosto()
    {
        return $this->belongsToMany(AgregarCostosModal::class);
    }
}
