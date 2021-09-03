<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('celular')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('contrasena');
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
