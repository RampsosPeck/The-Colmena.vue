<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('slug')->unique();
            $table->string('celular');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tipo')->default('Cliente');
            $table->string('foto')->default('avatar.jpg')->nullable();
            $table->boolean('activo')->default(true);
            $table->text('acerca')->nullable();
            $table->string('direccion')->nullable();
            $table->point('location')->nullable();
            $table->double('lat',20,10)->nullable();
            $table->double('lng',20,10)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
