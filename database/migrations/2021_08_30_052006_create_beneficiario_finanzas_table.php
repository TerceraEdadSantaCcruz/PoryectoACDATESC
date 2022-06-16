<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiarioFinanzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiario_finanzas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('fin_id');
            $table->unsignedBigInteger('beneficiario_id')->nullable();
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios');
            $table->string('Tipo_Cuota', 50);
            $table->date('Fecha_Pago');
            $table->date('Fecha_Proximo_Pago')->nullable();
            $table->integer('Monto');
            $table->string('Descripcion', 300)->nullable();
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
        Schema::dropIfExists('beneficiario_finanzas');
    }
}
