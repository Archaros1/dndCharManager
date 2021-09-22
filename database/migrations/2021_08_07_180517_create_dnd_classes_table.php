<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDndClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dnd_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_spellcaster');
            $table->boolean('is_custom');
            $table->integer('sub_class_obtention_level');
            $table->integer('hitdice');

            $table->foreignId('description_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('spellcasting_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('feature_list_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('proficiency_list_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('dnd_classes');
    }
}
