<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsumosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insumos')->insert([
            [
                'codigo' => '00',
                'nombre' => 'Pala',
                'unidad' => 'kg',
                'precio' => 10000,
                'cantidad' => 100,
                'tipo' => 1,
                'fecha_vencimiento' => Carbon::now(),
            ]
        ]); 
    }
}
