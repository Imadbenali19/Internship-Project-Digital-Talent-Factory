<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EcolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ecoles')->insert([
            'NomEcole' => 'Ecole Marocaine des Sciences de l\'Ingénieur (Marrakech 1)',
            'TypeEcole' => 'Privée',
            'AdresseEcole' => '05 lot bouizgaren, Rte de Safi, Marrakech 40000',
            'DateFondationEcole' => '1986-01-01',
            'VilleEcole' => 'Marrakech',
            'EmailEcole' => 'informations@emsi.ma',
            'TelEcole' => '0524422222',
            'LinkedInEcole' => 'ecole-marocaine-des-sciences-de-l\'ingénieur',
            'SiteWebEcole' => 'www.emsi.ma',
            'HistoireEcole' => 'En 1986, nous étions quatre professeurs, membres fondateurs de l’École Marocaine des Sciences de l’Ingénieur qui avions décidé de prendre le relais de la formation d’ingénieurs en 4 ans après le bac. Le cursus de la formation initialement choisi correspondait à nos domaines de compétences et répondait parfaitement aux besoins du secteur de l’emploi. Notre formation actuelle est devenue une formation Bac+5. Notre école suit de près l’évolution technologique et les changements stratégiques du Maroc. C’est dans ce cadre que nous avons créé plusieurs ﬁlières.',
            'PhotoEcole' => 'EMSI.png',
            'created_at' => date('y-m-d H:i:s'),
            'updated_at' => date('y-m-d H:i:s'),
        ]);
    }
}
