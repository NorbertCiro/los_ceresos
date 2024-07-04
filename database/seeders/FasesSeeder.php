<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fases')->insert([
            [
                'nombre' => 'Inicial',
            ],
            [
                'nombre' => 'Intermedia',
            ],
            [
                'nombre' => 'Final',
            ]
        ]);
    }
}
