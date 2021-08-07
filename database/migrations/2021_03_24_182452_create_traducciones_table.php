<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraduccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traducciones', function (Blueprint $table) {
            $table->id();
            $table->string('table');
            $table->string('column');
            $table->unsignedBigInteger('row_id');
            $table->string('locale');
            $table->longText('translation');
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
        Schema::dropIfExists('traducciones');
    }
}
