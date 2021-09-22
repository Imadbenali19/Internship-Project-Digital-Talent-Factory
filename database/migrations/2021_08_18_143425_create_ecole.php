<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecoles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NomEcole',100);
            $table->string('TypeEcole',30);
            $table->string('AdresseEcole',200);
            $table->date('DateFondationEcole')->nullable();
            $table->string('VilleEcole')->nullable();
            $table->string('EmailEcole',70)->nullable();
            $table->string('TelEcole',15)->nullable();
            $table->string('LinkedInEcole',100)->nullable();
            $table->string('SiteWebEcole',100)->nullable();
            $table->text('HistoireEcole')->nullable();
            $table->string('PhotoEcole')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ecoles');
    }
}
