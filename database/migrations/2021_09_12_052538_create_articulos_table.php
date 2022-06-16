<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('codigo', 30)->nullable();
            $table->string('nombre', 30);
            $table->date('fecha_registro');
            $table->date('fecha_caducidad')->nullable();
            $table->text('descripcion', 300)->nullable();
            $table->integer('cantidad');
            $table->unsignedBigInteger('inventario_id');
            $table->foreign('inventario_id')->references('inv_id')->on('inventarios');
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
        Schema::dropIfExists('articulos');
    }
}
