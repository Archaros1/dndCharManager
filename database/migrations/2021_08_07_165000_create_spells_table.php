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
            $table->string('display_name');
            $table->integer('level');
            $table->string('range');
            $table->string('components');
            $table->text('material')->nullable();;
            $table->boolean('concentration');
            $table->boolean('has_saving_throw');
            $table->string('saving_throw_attribute')->nullable();;
            $table->boolean('is_spell_attack');
            $table->string('attack_type')->nullable();
            $table->boolean('do_damage');
            $table->string('roll')->nullable();
            $table->string('casting_time');
            $table->string('school');
            $table->boolean('ritual');
            $table->boolean('is_custom');
            $table->boolean('enpowerable');

            $table->foreignId('description_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');

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
