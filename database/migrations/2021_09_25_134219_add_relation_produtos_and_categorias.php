<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationProdutosAndCategorias extends Migration
{

    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->integer('categoria_id');
        });
    }

    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('categoria_id');
        });
    }
}
