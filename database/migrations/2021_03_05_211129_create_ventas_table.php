<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idpasajero');
            $table->foreign('idpasajero')->references('id')->on('pasajeros')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('idautobus');
            $table->foreign('idautobus')->references('id')->on('autobuses')->cascadeOnDelete()->cascadeOnUpdate();;
            $table->integer('costo')->unsigned()->default(220);
            $table->integer('costoc')->unsigned()->default(0);
            $table->integer('descuento')->unsigned()->default(100);
            $table->integer('costofinal')->unsigned()->default(0);
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
        Schema::dropIfExists('ventas');
    }
}
