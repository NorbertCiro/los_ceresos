<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    /**
     * Trae la fase asociada esta actividad.
     */
    public function fase()
    {
        return $this->belongsToMany(Fase::class);
    }

    /**
     * Trae el costo adicional asociado esta actividad.
     */
    public function costoAdicional()
    {
        return $this->belongsToMany(CostoAdicional::class);
    }

    /**
     * Trae el insumo asociada esta actividad.
     */
    public function insumo()
    {
        return $this->belongsToMany(Insumo::class);
    }
}
