<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedFeatureChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_feature_choices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('character_id')->constrained();
            $table->foreignId('feature_id')->constrained();
            $table->foreignId('feature_choice_id')->constrained();

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
        Schema::dropIfExists('selected_feature_choices');
    }
}
