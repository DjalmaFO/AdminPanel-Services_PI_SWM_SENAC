<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProdutoCarrinhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produto_carrinhos', function (Blueprint $table) {
            $table->integer('id_carrinho')->references('tb_carinhos')->on('id');
            $table->integer('id_produto')->references('tb_produtos')->on('id');
            $table->integer('qtd_produto');
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
        Schema::dropIfExists('tb_produto_carrinhos');
    }
}
