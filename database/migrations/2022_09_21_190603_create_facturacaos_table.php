<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacaosTable extends Migration
{
    /**                                                                
   
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id');
            $table->string('largura_banda');
            $table->string('aumento_banda');
            $table->string('preco_unitario');
            $table->string('ano');
            $table->string('mes');
            $table->string('n_factura');
            $table->string('valor_facturado');
            $table->string('debito');
            $table->string('credito');
            $table->string('valor_pago');
            $table->string('divida_saldo');
            $table->string('data_pagamento');
            $table->string('n_documento');
            $table->dateTime('deleted_at');
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
        Schema::dropIfExists('facturacaos');
    }
}
