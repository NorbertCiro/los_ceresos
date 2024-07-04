<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    /**
     * Trae la actividad asociada este insumo.
     */
    public function actividad()
    {
        return $this->belongsToMany(Actividad::class);
    }
}
