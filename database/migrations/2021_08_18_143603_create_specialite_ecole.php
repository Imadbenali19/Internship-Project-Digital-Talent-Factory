<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialiteEcole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialites_ecoles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('specialite_id')->unsigned();
            $table->foreign('specialite_id')->references('id')->on('specialites')->cascadeOnDelete()->cascadeOnUpdate();;
            
            $table->integer('ecole_id')->unsigned();
            $table->foreign('ecole_id')->references('id')->on('ecoles')->cascadeOnDelete()->cascadeOnUpdate();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialites_ecoles');
    }
}
