<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->set('tipo', ['Aseo', 'Alimentos frescos', 'Alimentos congelados', 'Bebidas', 'Alimentos Empacados', 'Basicos del hogar', 'Cuidado Personal'] );
            $table->integer('precio');
            $table->integer('cantidad_disponible');
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
        Schema::dropIfExists('productos');
    }
}
