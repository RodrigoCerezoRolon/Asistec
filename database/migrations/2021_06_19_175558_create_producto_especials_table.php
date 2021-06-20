<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoEspecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_especials', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->longText('texto');
            $table->string('img_uno');
            $table->string('img_dos')->nullable();
            $table->string('img_tres')->nullable();
            $table->string('img_cuatro')->nullable();
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
        Schema::dropIfExists('producto_especials');
    }
}
