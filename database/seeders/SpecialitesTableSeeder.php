<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialites')->insert([
            'NomSpec' => 'Ingenierie Informatique et Réseaux',
            'DescriptionSpec' => 'La filière Ingénierie Informatique et Réseaux de l’EMSI a pour objectif de former des Ingénieurs polyvalents dans les domaines du génie informatique, tout en alliant l’esprit d’analyse et de conception à celui de la mise en œuvre et de la réalisation.',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
    }
}
