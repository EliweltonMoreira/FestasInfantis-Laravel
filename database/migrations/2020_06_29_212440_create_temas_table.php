<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemasTable extends Migration
{
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->float('valorAluguel');
            $table->string('corDestaque');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temas');
    }
}
