<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoHabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('tipos_habitaciones')->insert([
            ['nombre' => 'estándar', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'junior', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'suite', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
