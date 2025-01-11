<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoHabitacionAcomodacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_habitacion_acomodacion')->insert([
            // Estándar
            ['tipo_habitacion_id' => 1, 'acomodacion_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tipo_habitacion_id' => 1, 'acomodacion_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Junior
            ['tipo_habitacion_id' => 2, 'acomodacion_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tipo_habitacion_id' => 2, 'acomodacion_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            // Suite
            ['tipo_habitacion_id' => 3, 'acomodacion_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tipo_habitacion_id' => 3, 'acomodacion_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['tipo_habitacion_id' => 3, 'acomodacion_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
