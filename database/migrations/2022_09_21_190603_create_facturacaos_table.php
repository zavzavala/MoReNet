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
            $table->foreignId('empresa_id')->constrained('empresas');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('largura_banda_contratada')->default(0);
            $table->integer('aumento_banda')->default(0);
            $table->decimal('preco_unitario');
            $table->decimal('banda_facturada')->default(0);
            $table->decimal('valor_facturado');
            $table->date('data_aumento_banda')->nullable();
            $table->integer('diminuicao_banda')->default(0);
            $table->date('data_diminuicao_banda')->nullable();
            $table->string('comprovativo');
            $table->date('data_facturacao');
            $table->decimal('valor_pago')->default(0);
            $table->decimal('credito');
            $table->decimal('debito');
            $table->decimal('divida');

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
