<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tema_id');
            $table->string('nome');
            $table->string('descricao');
            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->foreign('tema_id')->references('id')->on('temas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
