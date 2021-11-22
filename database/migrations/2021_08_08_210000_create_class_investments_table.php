<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_investments', function (Blueprint $table) {
            $table->id();
            $table->integer('level');

            $table->integer('spells_known_count');
            $table->integer('cantrips_known_count');
            $table->integer('stolen_spells_count');

            $table->foreignId('character_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('dnd_classes');
            $table->unsignedBigInteger('subclass_id')->nullable();
            $table->foreign('subclass_id')->references('id')->on('sub_classes');
            $table->unsignedBigInteger('known_spell_list_id')->nullable()->constrained()/* ->onUpdate('cascade')->onDelete('set null') */;
            $table->foreign('known_spell_list_id')->references('id')->on('spell_lists');
            $table->unsignedBigInteger('prepared_spell_list_id')->nullable()->constrained()/* ->onUpdate('cascade')->onDelete('set null') */;
            $table->foreign('prepared_spell_list_id')->references('id')->on('spell_lists');
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
        Schema::dropIfExists('class_investments');
    }
}
