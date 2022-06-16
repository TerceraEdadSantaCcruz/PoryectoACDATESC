<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtencionPeriodicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atencion_periodicas', function (Blueprint $table) {
            $table->id('aten_id');
            $table->date('Fecha');
            $table->string('Presion_Arterial', 50);
            $table->string('Palpitaciones', 50);
            $table->string('Diabetes', 50);
            $table->string('Temperatura', 50);
            $table->string('Oxigeno', 50);
            $table->string('Observaciones', 300)->nullable();
            $table->unsignedBigInteger('beneficiario_id');
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atencion_periodicas');
    }
}
