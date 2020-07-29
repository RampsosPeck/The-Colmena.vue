<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodetalle', function (Blueprint $table) {
            $table->id();
            $table->string('entrada')->nullable();
            $table->string('sopa')->nullable();
            $table->string('segundo')->nullable();
            $table->string('postre')->nullable();
            $table->string('refresco')->nullable();
            $table->text('especificacion');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('prodetalles');
    }
}
