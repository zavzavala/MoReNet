<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->string('telefone');
            $table->string('email');
            $table->string('localizacao');
            $table->integer('nuit');
            $table->string('tipo');///ver se e ministerio ou insttituicao publica.
            $table->string('tipo_empresa');
            $table->string('url');
            $table->date('data_contrato');
            $table->string('descricao');
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
        Schema::dropIfExists('empresas');
    }
}
