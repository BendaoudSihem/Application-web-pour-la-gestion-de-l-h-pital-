<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('email');
            $table->string('sexe');
            $table->string('NumSecurite');
            $table->string('image')->default('image.jpg');
            $table->string('archive')->default('non');
            $table->string('song');
            $table->integer('tlf');
            $table->float('taille');
            $table->float('poid');
            $table->integer('IdUser')->nullable();
            $table->date('datNai');
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
        Schema::dropIfExists('patients');
    }
}
