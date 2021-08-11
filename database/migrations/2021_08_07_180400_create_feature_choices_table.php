<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_choices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_action');
            $table->boolean('is_custom');
            $table->boolean('is_spellcasting');

            $table->foreignId('feature')->constrained();
            $table->foreignId('description')->constrained()->nullable();

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
        Schema::dropIfExists('feature_choices');
    }
}