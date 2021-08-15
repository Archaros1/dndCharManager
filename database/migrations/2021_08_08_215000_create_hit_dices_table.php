<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHitDicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hit_dices', function (Blueprint $table) {
            $table->id();
            $table->integer('max_value');
            $table->integer('rolled_value')->nullable();

            $table->foreignId('class_investment_id')->constrained()->nullable();

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
        Schema::dropIfExists('hit_dices');
    }
}
