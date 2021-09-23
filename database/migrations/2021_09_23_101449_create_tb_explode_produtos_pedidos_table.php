<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbExplodeProdutosPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_explode_produtos_pedidos', function (Blueprint $table) {
            $table->integer('id_pedido')->references('tb_pedidos')->on('id');
            $table->integer('id_produto')->references('produtos')->on('id');
            $table->integer('qtd_produto');
            $table->decimal('vl_produto');
            $table->decimal('vl_frete')->nullable();
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
        Schema::dropIfExists('tb_explode_produtos_pedidos');
    }
}
