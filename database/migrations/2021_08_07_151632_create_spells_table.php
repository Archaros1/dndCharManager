<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spells', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('level');
            $table->boolean('has_saving_throw');
            $table->boolean('is_spell_attack');
            $table->boolean('do_damage');
            $table->string('roll')->nullable();
            $table->string('casting_time');
            $table->string('school');
            $table->boolean('is_custom');

            $table->foreignId('description_id')->constrained()->nullable();

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
        Schema::dropIfExists('spells');
    }
}
