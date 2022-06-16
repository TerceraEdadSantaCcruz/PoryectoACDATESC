<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->string('Identificacion_Beneficiario', 20)->unique();
            $table->string('Nombre', 30);
            $table->string('Apellido_1', 30);
            $table->string('Apellido_2', 30);
            $table->integer('Telefono')->length(50)->nullable();
            $table->date('Fecha_nacimiento');
            $table->integer('Edad');
            $table->string('Direccion', 255);
            $table->string('Fotografia')->nullable();
            $table->date('Fecha_Ingreso')->nullable();
            $table->date('Fecha_Salida')->nullable();

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
        Schema::dropIfExists('beneficiarios');
    }
}
