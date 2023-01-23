<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

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
            $table->foreignId('empresa_id')->references('empresas')->on('id')->cascadeOnDelete();
            $table->foreignId('user_id')->references('users')->on('id');
            $table->string('largura_banda');
            $table->string('aumento_banda');
            $table->decimal('preco_unitario')->default(0);
            $table->string('ano');
            $table->string('mes');
            $table->string('n_factura');
            $table->decimal('valor_facturado')->default(0);
            $table->decimal('debito')->default(0);
            $table->decimal('credito')->default(0);
            $table->decimal('valor_pago')->default(0);
            $table->decimal('divida_saldo')->default(0);
            $table->string('data_pagamento');
            $table->string('n_documento');
            $table->softDeletes();
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
