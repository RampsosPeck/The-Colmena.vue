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
        Schema::create('prodetalles', function (Blueprint $table) {
            $table->id();
            $table->string('entrada')->nullable();
            $table->string('sopa')->nullable();
            $table->string('segundo')->nullable();
            $table->string('postre')->nullable();
            $table->string('refresco')->nullable();
            $table->text('especificaion');
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
