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
            $table->string('casting_stat')->nullable();

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
        Schema::dropIfExists('dnd_classes');
    }
}
