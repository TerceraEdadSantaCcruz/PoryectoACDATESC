<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncargadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encargados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('beneficiario_id')->unique();
            $table->foreign('beneficiario_id')
                  ->references('id')
                  ->on('beneficiarios')
                  ->onDelete('cascade');
            $table->string('Identificacion_Encargado', 20)->unique();
            $table->string('Nombre_Encargado', 30);
            $table->string('Apellido_1_Encargado', 30);
            $table->string('Apellido_2_Encargado', 30);
            $table->integer('Telefono_Encargado')->length(50)->nullable();
            $table->string('Correo_Electronico_Encargado', 50)->unique()->nullable();
            $table->date('Fecha_Nacimiento_Encargado');
            $table->string('Direccion_Encargado', 255);
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
        Schema::dropIfExists('encargados');
    }
}
