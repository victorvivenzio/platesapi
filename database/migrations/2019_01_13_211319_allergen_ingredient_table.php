<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllergenIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergen_ingredient', function (Blueprint $table) {
            $table->integer('allergen_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();
            $table->foreign('allergen_id')->references('id')->on('allergen_idergens')->onDelete('restrict');
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
        Schema::dropIfExists('allergen_ingredient');
    }
}
