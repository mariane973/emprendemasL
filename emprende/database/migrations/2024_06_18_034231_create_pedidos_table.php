<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cliente');
            $table->string('nombre_cl');
            $table->string('email_cl');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('telefono');
            $table->string('nombre_producto');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->integer('total');
            $table->bigInteger('id_vendedor')->unsigned();
            $table->foreign('id_vendedor')->references('user_id')->on('vendedores')->onDelete('cascade');
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
        Schema::dropIfExists('pedidos');
    }
}
