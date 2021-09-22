<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Specialites_EcolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialites_ecoles')->insert([
            'specialite_id' => 1,
            'ecole_id' => 1,
        ]);
    }
}
