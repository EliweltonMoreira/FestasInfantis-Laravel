<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAluguelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluguels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id');
            $table->date('dataFesta');
            $table->time('horarioInicio');
            $table->time('horarioTermino');
            $table->float('valorCobrado');
            $table->string('endereco');
            $table->string('complemento');
            $table->string('cidade');
            $table->string('uf');
            $table->timestamps();
        });

        Schema::table('aluguels', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluguels');
    }
}
