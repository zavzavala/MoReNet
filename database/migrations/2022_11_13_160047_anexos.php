<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Anexos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexos', function (Blueprint $table){
            $table->id();
            $table->foreignId('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('url');
            $table->string('descricao');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexos');
    }
}
