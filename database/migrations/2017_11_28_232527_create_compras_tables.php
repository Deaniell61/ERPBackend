<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->double('total',5,2)->nullable()->default(null);
            $table->timestamp('fecha')->useCurrent();
            $table->string('comprobante')->nullable()->default(null);
            $table->tinyInteger('estado')->nullable()->default(2);

            $table->integer('tipo')->nullable()->default(null);
            $table->foreign('tipo')->references('id')->on('tiposcompra')->onDelete('cascade');

            $table->integer('proveedor')->nullable()->default(null);
            $table->foreign('proveedor')->references('id')->on('proveedores')->onDelete('cascade');

            $table->integer('usuario')->nullable()->default(null);
            $table->foreign('usuario')->references('id')->on('usuarios')->onDelete('cascade');

            $table->integer('sucursal')->nullable()->default(null);
            $table->foreign('sucursal')->references('id')->on('sucursales')->onDelete('cascade');

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
        Schema::dropIfExists('compras');
    }
}
