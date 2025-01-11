<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AcomodacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('acomodaciones')->insert([
            ['nombre' => 'sencilla', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'doble', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'triple', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre' => 'cuadruple', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
