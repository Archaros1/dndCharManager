<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slot_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('class_level')->nullable();
            $table->integer('level_0');
            $table->integer('level_1');
            $table->integer('level_2');
            $table->integer('level_3');
            $table->integer('level_4');
            $table->integer('level_5');
            $table->integer('level_6');
            $table->integer('level_7');
            $table->integer('level_8');
            $table->integer('level_9');
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
        Schema::dropIfExists('slot_lists');
    }
}
