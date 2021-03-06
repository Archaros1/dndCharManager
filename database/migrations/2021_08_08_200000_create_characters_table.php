<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('level');
            $table->boolean('is_spellcaster')->nullable();
            $table->integer('health')->nullable();

            $table->foreignId('race_id')->constrained();
            // $table->foreignId('sub_race_id')->constrained();
            $table->foreignId('sub_race_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('stat_pack_id')->constrained();
            $table->unsignedBigInteger('final_stat_pack_id')->nullable()->constrained()/* ->onUpdate('cascade')->onDelete('set null') */;
            $table->foreign('final_stat_pack_id')->references('id')->on('stat_packs');
            // $table->foreignId('final_stat_pack_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('background_id')->constrained();

            $table->unsignedBigInteger('slot_list_long_rest_id')->nullable()->constrained();
            $table->foreign('slot_list_long_rest_id')->references('id')->on('slot_lists');
            $table->unsignedBigInteger('slot_list_short_rest_id')->nullable()->constrained();
            $table->foreign('slot_list_short_rest_id')->references('id')->on('slot_lists');

            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
