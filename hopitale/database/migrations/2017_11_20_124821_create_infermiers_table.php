<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfermiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infermiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('email');
            $table->string('sexe');
            $table->string('grade');
            $table->string('image')->default('image.jpg');
            $table->string('archive')->default('non');
            $table->string('song');
            $table->string('specialite');
            $table->integer('tlf');
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
        Schema::dropIfExists('infermiers');
    }
}
