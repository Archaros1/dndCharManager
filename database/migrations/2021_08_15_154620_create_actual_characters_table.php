<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actual_characters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('character_id')->constrained();

            $table->integer('left_health');

            $table->unsignedBigInteger('left_slot_list_long_rest_id')->nullable()->constrained();
            $table->foreign('left_slot_list_long_rest_id')->references('id')->on('slot_lists');
            $table->unsignedBigInteger('left_slot_list_short_rest_id')->nullable()->constrained();
            $table->foreign('left_slot_list_short_rest_id')->references('id')->on('slot_lists');

            $table->unsignedBigInteger('concentration_spell_id')->nullable()->constrained();
            $table->foreign('concentration_spell_id')->references('id')->on('spells');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actual_characters');
    }
}
