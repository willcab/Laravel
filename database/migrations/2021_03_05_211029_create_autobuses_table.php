<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutobusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autobuses', function (Blueprint $table) {
            $table->increments('id');
            $table->char('conductor');
            $table->char('ruta');
            $table->integer('cap')->unsigned()->default('0');
            $table->integer('uso')->unsigned()->default('0');
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
        Schema::dropIfExists('autobuses');
    }
}
