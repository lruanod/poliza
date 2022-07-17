<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descripcion',1000);
            $table->string('cantidadm',120);
            $table->string('numeroco',120);
            $table->integer('correlativo');
            $table->integer('numerobu');
            $table->unsignedBigInteger('poliza_id');
            $table->timestamps();

            $table->foreign('poliza_id')->references('id')->on('polizas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
}
