<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtudiantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etudiants')->insert([
            'NomEtud' => 'Ben-Ali',
            'PrenomEtud' => 'Imad',
            'DateNaissEtud' => '2001-01-15',
            'AgeEtud' => 20,
            'NiveauEtud' => '4',
            'PhotoEtud' => 'BenAli_Imad.png',
            'EmailEtud' => 'benali.ib19@gmail.com',
            'TelEtud' => '0663034534',
            'LinkedInEtud' => 'imad-ben-ali-5613681b1',
            'AnneeDeGraduationEtud' => 2023,
            'IsGradueEtud' => 0,
            'ecole_id' => 1,
            'specialite_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);

        DB::table('etudiants')->insert([
            'NomEtud' => 'Benhaddouch',
            'PrenomEtud' => 'Abdelmonaim',
            'DateNaissEtud' => '1999-02-06',
            'AgeEtud' => 22,
            'NiveauEtud' => '4',
            'PhotoEtud' => 'BenHaddouch_Abdelmonaim.png',
            'EmailEtud' => 'benhahouch99@gmail.com',
            'TelEtud' => '0612166067',
            'LinkedInEtud' => '',
            'AnneeDeGraduationEtud' => 2023,
            'IsGradueEtud' => 0,
            'ecole_id' => 1,
            'specialite_id' => 1,
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
    }
}
