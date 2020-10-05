<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTemaidToAluguelsTable extends Migration
{
    public function up()
    {
        Schema::table('aluguels', function (Blueprint $table) {
            $table->foreignId('tema_id')->nullable()->after('cliente_id');
            $table->foreign('tema_id')->references('id')->on('temas');
        });
    }

    public function down()
    {
        Schema::table('aluguels', function (Blueprint $table) {
            $table->dropForeign(['tema_id']);
            $table->dropColumn('tema_id');
        });
    }
}
