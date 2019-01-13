<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IngredientPlateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_plate', function (Blueprint $table) {
            $table->integer('plate_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();
            $table->foreign('plate_id')->references('id')->on('plates')->onDelete('restrict');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_plate');
    }
}
