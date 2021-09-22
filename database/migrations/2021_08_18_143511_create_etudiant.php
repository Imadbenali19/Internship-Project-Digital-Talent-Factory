<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NomEtud',80);
            $table->string('PrenomEtud',80);
            $table->date('DateNaissEtud')->nullable();
            $table->integer('AgeEtud')->unsigned()->nullable();
            $table->string('NiveauEtud',80)->nullable();
            $table->string('PhotoEtud')->nullable();
            $table->string('EmailEtud',250)->nullable();
            $table->string('TelEtud',15)->nullable();
            $table->text('LinkedInEtud')->nullable();
            $table->integer('AnneeDeGraduationEtud')->unsigned()->nullable();
            $table->tinyInteger('IsGradueEtud')->default(0);
            $table->integer('ecole_id')->unsigned()->nullable();
            $table->foreign('ecole_id')->references('id')->on('ecoles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('specialite_id')->unsigned()->nullable();
            $table->foreign('specialite_id')->references('id')->on('specialites')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('etudiants');
    }
}
