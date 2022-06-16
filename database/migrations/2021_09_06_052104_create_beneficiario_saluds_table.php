<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiarioSaludsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiario_saluds', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('beneficiario_salud_id');
            $table->unsignedBigInteger('beneficiario_id')->nullable();
            $table->date('Fecha');
            $table->string('Peso', 50);
            $table->string('IMC', 50);
            $table->string('Talla', 50);
            $table->string('Religion', 50)->nullable();
            $table->string('HTA');
            $table->string('Diabetes');
            $table->string('Asma');
            $table->string('Gastritis');
            $table->string('Tiroides');
            $table->string('Cardiopatia');
            $table->string('Trigliceridos_Colesterol');
            $table->string('Observaciones_patologicas', 300)->nullable();
            $table->string('Medicamentos_Dosis', 255)->nullable();
            $table->string('DiagnosticoFisioterapeutico', 255)->nullable();
            $table->string('Cirugia');
            $table->string('Descripcion_Cirugia', 300)->nullable();
            $table->string('AyudaBiomecanica');
            $table->string('Descripcion_AyudaBiomecanica', 300)->nullable();
            $table->string('Protesis_Dental');
            $table->string('Descripcion_Protesis_Dental', 300)->nullable();
            $table->string('Alimentos_Intolerables', 300)->nullable();
            $table->string('Alimentos_Favoritos', 300)->nullable();
            $table->string('Sueño');
            $table->string('Descripcion_Sueño', 300)->nullable();
            $table->string('Incontinencia');
            $table->string('Descripcion_Incontinencia', 300)->nullable();
            $table->string('Apoyo_Familiar');
            $table->string('Descripcion_Apoyo_Familiar', 300)->nullable();
            $table->string('Deficit_Visual');
            $table->string('Deficit_Auditiva');
            $table->string('Padecimiento_Tratamiento', 255)->nullable();
            $table->string('Observaciones', 300)->nullable();
            $table->timestamps();
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('beneficiario_saluds');
    }
}
