<?php

namespace Database\Seeders;

use App\Models\Cultivo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CultivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cultivos')->insert([
            [
                'nombre' => 'Cultivo de mora',
                'fecha_inicio' => Carbon::now(),
                'fecha_cosecha' => Carbon::now(),
                'area_terreno' => 650,
                'densidad' => 346,
                'plantas_area' => 200,
                'tipo' => 1
            ]
        ]);
    }
}
