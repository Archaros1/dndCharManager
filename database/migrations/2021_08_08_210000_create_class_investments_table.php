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

            $table->foreignId('character_id')->constrained();
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('dnd_classes');
            $table->unsignedBigInteger('subclass_id');
            $table->foreign('subclass_id')->references('id')->on('sub_classes');
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
