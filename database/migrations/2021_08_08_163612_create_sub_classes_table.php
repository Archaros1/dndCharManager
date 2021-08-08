<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('archetype');
            $table->boolean('is_custom');
            $table->boolean('is_spellcaster');
            $table->string('casting_stat')->nullable();

            // $table->foreignId('dnd_class_id')->constrained();
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('dnd_classes');
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
        Schema::dropIfExists('sub_classes');
    }
}
