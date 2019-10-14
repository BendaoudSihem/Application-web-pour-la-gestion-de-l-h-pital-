<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalisations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('rendez_vous')->nullable();
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('lit_num')->unsigned()->nullable();
            $table->foreign('lit_num')->references('numLit')->on('lits')->onDelete('no action')->onUpdate('cascade');
            $table->integer('chambre_num')->unsigned()->nullable();
            $table->foreign('chambre_num')->references('numChambre')->on('chambres')->onDelete('no action')->onUpdate('cascade');
            $table->string('service')->nullable();
            $table->foreign('service')->references('service')->on('chambres')->onDelete('no action')->onUpdate('cascade');
            $table->date('debut');
            $table->date('fin');
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
        Schema::dropIfExists('hospitalisations');
    }
}
