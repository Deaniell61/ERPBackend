<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasdetalleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventasdetalle', function (Blueprint $table) {
            $table->increments('id');
            $table->double('subtotal',5,2)->nullable()->default(null);
            $table->double('cantidad',5,2)->nullable()->default(null);
            $table->double('precio',7,2)->nullable()->default(null);
            $table->double('precioE',7,2)->nullable()->default(null);
            $table->double('precioM',7,2)->nullable()->default(null);
            $table->double('descuento',7,2)->nullable()->default(null);
            $table->date('vencimiento')->nullable()->default(null);
            $table->string('garantia')->nullable()->default(null);
            $table->tinyInteger('estado')->nullable()->default(2);

            $table->integer('venta')->nullable()->default(null);
            $table->foreign('venta')->references('id')->on('ventas')->onDelete('cascade');

            $table->integer('producto')->nullable()->default(null);
            $table->foreign('producto')->references('id')->on('productos')->onDelete('cascade');

            $table->integer('tipo')->nullable()->default(null);
            $table->foreign('tipo')->references('id')->on('tiposdetalleventas')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('ventasdetalle');
    }
}
