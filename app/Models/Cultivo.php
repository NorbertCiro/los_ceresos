<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    use HasFactory;

    /**
     * Trae las fases asociadas al cultivo.
     */
    public function fases()
    {
        return $this->belongsToMany(Fase::class);
    }

}
