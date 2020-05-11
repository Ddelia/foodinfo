<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('food_group');
            $table->string('calories')->nullable();
            $table->string('fat')->nullable();
            $table->string('carbs')->nullable();
            $table->string('net_carbs')->nullable();
            $table->string('sugars')->nullable();
            $table->string('fiber')->nullable();
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
        Schema::dropIfExists('food_data');
    }
}
