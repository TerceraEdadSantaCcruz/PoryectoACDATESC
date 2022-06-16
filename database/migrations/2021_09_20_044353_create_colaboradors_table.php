<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->string('Identificacion', 20)->unique();
            $table->string('Nombre', 30);
            $table->string('Apellido_1', 30);
            $table->string('Apellido_2', 30);
            $table->integer('Telefono')->length(50)->nullable();
            $table->date('Fecha_nacimiento');
            $table->integer('Edad');
            $table->string('Direccion', 255);
            $table->string('Fotografia')->nullable();
            $table->string('Puesto', 30);
            $table->string('Comentarios', 300)->nullable();
            $table->string('Correo_Electronico_Colaborador', 50)->unique()->nullable();
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
        Schema::dropIfExists('colaboradors');
    }
}
