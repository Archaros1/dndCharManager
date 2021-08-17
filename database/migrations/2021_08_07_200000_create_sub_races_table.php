<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_races', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_custom');
            $table->boolean('is_spellcaster');
            $table->string('casting_stat')->nullable();

            $table->foreignId('race_id')->constrained()->nullable();
            $table->unsignedBigInteger('stat_modif_id');
            $table->foreign('stat_modif_id')->references('id')->on('stat_packs');
            $table->foreignId('description')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('feature_list_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('sub_races');
    }
}
